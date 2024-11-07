<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Carbon\Carbon;  // Import Carbon
use Illuminate\Support\Facades\Log;

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

        // Authenticate the token
        $token = $googleClient->fetchAccessTokenWithAuthCode($request->get('code'));

        if (isset($token['error'])) {
            return redirect()->route('google.redirect')->with('error', 'Google login failed.');
        }

        // Store the token in session
        session(['google_token' => $token]);
        return redirect('afspraken')->with('success', 'Google login successful!');
    }

    /**
     * Store a newly created appointment in storage and add to Google Calendar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'device_name' => 'required|string|max:255',
            'device_type' => 'required|string',
            'description' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'place_of_appointment' => 'required|string|max:255',
            'price' => '|numeric|min:0',
        ]);

        // Add the user ID
        $validatedData['account_id'] = auth()->user()->id;

        // Create a new appointment in the database
        $appointment = Appointment::create($validatedData);

        // Initialize Google Client
        $googleClient = new Google_Client();
        $googleClient->setAuthConfig(storage_path('app/google_credentials.json'));
        $googleClient->addScope(Google_Service_Calendar::CALENDAR);
        
        // Get the access token from the session
        $accessToken = session('google_token');

        if (!$accessToken) {
            return redirect()->route('google.redirect');
        }

        $googleClient->setAccessToken($accessToken);

        // Check if the token is expired
        if ($googleClient->isAccessTokenExpired()) {
            // Try to refresh the token
            if ($googleClient->getRefreshToken()) {
                $googleClient->fetchAccessTokenWithRefreshToken($googleClient->getRefreshToken());
                // Save the new access token
                session(['google_token' => $googleClient->getAccessToken()]);
            } else {
                // Redirect to the login page if no refresh token exists
                return redirect()->route('google.redirect');
            }
        }

        // Initialize Google Calendar service
        $service = new Google_Service_Calendar($googleClient);

        // Define the start and end time for the event
        $startTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_time)->subHour(); // Set 1 hour earlier
        $endTime = $startTime->copy()->addHour(); // Set the end time to 1 hour after the start time

        // Create the event object
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
                'useDefault' => false,  // Disable the default reminders
                'overrides' => [
                    [
                        'method' => 'popup',  // Set a popup reminder
                        'minutes' => 1440,    // 1440 minutes = 1 day before
                    ],
                ],
            ],
        ]);

        // Insert the event into the Google Calendar
        try {
            $event = $service->events->insert('primary', $event);
            // Store the event ID or other relevant info in your database if needed
        } catch (\Google_Service_Exception $e) {
            Log::error('Google API Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error adding the event to Google Calendar.');
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Afspraak succesvol gemaakt en toegevoegd aan je Google Kalender!');
    }
}
