<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;
use Session;
use Log;

class GoogleController extends Controller
{
    protected $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId(config('services.google.client_id'));
        $this->googleClient->setClientSecret(config('services.google.client_secret'));
        $this->googleClient->setRedirectUri(config('services.google.redirect'));
        
        $this->googleClient->addScope(Google_Service_Calendar::CALENDAR);
    }

    public function addEventToCalendar(Request $request)
    {
        $googleClient = $this->googleClient;

        if (Session::has('google_token')) {
            $googleClient->setAccessToken(Session::get('google_token'));
        }

        if ($googleClient->isAccessTokenExpired()) {
            $googleClient->fetchAccessTokenWithRefreshToken($googleClient->getRefreshToken());
        }

        $calendarService = new Google_Service_Calendar($googleClient);

        $calendarId = 'primary';

        $event = new Google_Service_Calendar_Event([
            'summary' => 'Test Event',
            'location' => 'Somewhere',
            'description' => 'A test event for our Laravel app',
            'start' => [
                'dateTime' => '2024-11-10T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            'end' => [
                'dateTime' => '2024-11-10T10:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            'attendees' => [
                ['email' => 'test@example.com'],
            ],
        ]);

        try {
            $eventResponse = $calendarService->events->insert($calendarId, $event);
            Log::info('Event added successfully', ['event' => $eventResponse]);
            return redirect()->route('home')->with('success', 'Event added to QBsmartguy calendar!');
        } catch (\Google_Service_Exception $e) {
            Log::error('Google API Error: ' . $e->getMessage());
            Log::error('Error details: ' . print_r($e->getErrors(), true));

            return redirect()->route('home')->with('error', 'Failed to add event to QBsmartguy calendar.');
        }
    }
}
