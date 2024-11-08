<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Redirect the user to the Google OAuth consent screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        $googleClient = new Google_Client();
        $googleClient->setAuthConfig(storage_path('app/google_credentials.json'));
        $googleClient->addScope(Google_Service_Calendar::CALENDAR);
        $googleClient->setRedirectUri('http://localhost:8000/google/callback');

        $authUrl = $googleClient->createAuthUrl();
        return redirect()->away($authUrl);
    }

    /**
     * Handle the Google OAuth callback and store the token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback(Request $request)
    {
        $googleClient = new Google_Client();
        $googleClient->setAuthConfig(storage_path('app/google_credentials.json'));
        $googleClient->addScope(Google_Service_Calendar::CALENDAR);
        $googleClient->setRedirectUri(route('google.callback'));

        $token = $googleClient->fetchAccessTokenWithAuthCode($request->get('code'));

        if (isset($token['error'])) {
            return redirect()->route('google.redirect')->with('error', 'Google login failed.');
        }

        session(['google_token' => $token]);
        return redirect('afspraken')->with('success', 'Google login successful!');
    }

    /**
     * Store a newly created appointment in storage and add to Google Calendar if selected.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'device_name' => 'required|string|max:255',
            'device_type' => [
                'required',
                'string',
                Rule::in('Tablet', 'Telefoon', 'Laptop', 'Desktop', 'Overig'),
            ],
            'description' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'place_of_appointment' => [
                'required',
                'string',
                Rule::in(['Rotterdam', 'Den Haag', 'Amsterdam', 'Utrecht']),
            ],
            'price' => '|numeric|min:0',
            'add_to_google_calendar' => 'nullable|boolean',
        ]);

        $validatedData['account_id'] = auth()->user()->id;

        $appointment = Appointment::create($validatedData);

        if ($request->has('add_to_google_calendar') && $request->add_to_google_calendar == 1) {
            $googleClient = new Google_Client();
            $googleClient->setAuthConfig(storage_path('app/google_credentials.json'));
            $googleClient->addScope(Google_Service_Calendar::CALENDAR);

            $accessToken = session('google_token');

            if (!$accessToken) {
                return redirect()->route('google.redirect');
            }

            $googleClient->setAccessToken($accessToken);

            if ($googleClient->isAccessTokenExpired()) {
                if ($googleClient->getRefreshToken()) {
                    $googleClient->fetchAccessTokenWithRefreshToken($googleClient->getRefreshToken());
                    session(['google_token' => $googleClient->getAccessToken()]);
                } else {
                    return redirect()->route('google.redirect');
                }
            }

            $service = new Google_Service_Calendar($googleClient);

            $startTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_time)->subHour();
            $endTime = $startTime->copy()->addHour();

            $event = new Google_Service_Calendar_Event([
                'summary' => 'Appointment: ' . $request->device_name,
                'description' => $request->description,
                'location' => $request->place_of_appointment,
                'start' => new Google_Service_Calendar_EventDateTime([
                    'dateTime' => $startTime->toAtomString(),
                    'timeZone' => 'Europe/Amsterdam',
                ]),
                'end' => new Google_Service_Calendar_EventDateTime([
                    'dateTime' => $endTime->toAtomString(),
                    'timeZone' => 'Europe/Amsterdam',
                ]),
                'reminders' => [
                    'useDefault' => false,
                    'overrides' => [
                        [
                            'method' => 'popup',
                            'minutes' => 1440,
                        ],
                    ],
                ],
            ]);


            try {
                $event = $service->events->insert('primary', $event);

            } catch (\Google_Service_Exception $e) {
                Log::error('Google API Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Er was een error tijdens het toevoegen aan de Google Calender.');
            }

            return redirect('/afspraken')->with('success', 'Afspraak succesvol gemaakt en toegevoegd aan je Google Kalender!');
        }

        return redirect('/afspraken')->with('success', 'Afspraak succesvol gemaakt!');
    }
}
