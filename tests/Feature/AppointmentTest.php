<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Type\TrueType;
use Tests\CreatesApplication;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;
    use CreatesApplication;

    public function test_create_appointment()
    {
        // Maak een niet-admin gebruikersaccount aan
        $user = Account::factory()->create([
            'admin' => 0,
        ]);

        // Log de gebruiker in
        $this->actingAs($user);

        // Simuleer de request data voor de afspraak
        $data = [
            'device_name' => 'Tablet',
            'device_type' => 'Tablet',
            'description' => 'Een testafspraak voor een tablet',
            'appointment_date' => now()->toDateString(),
            'appointment_time' => now()->format('H:i'),
            'place_of_appointment' => 'Rotterdam',
            'price' => 100,
            'add_to_google_calendar' => True,
        ];

        // Maak de request om een afspraak op te slaan
        $response = $this->post(route('appointments.store'), $data);

        // Controleer of de afspraak in de database is opgeslagen
        $this->assertDatabaseHas('appointments', [
            'device_name' => 'Tablet',
            'description' => 'Een testafspraak voor een tablet',
        ]);

        // Zorg ervoor dat de gebruiker wordt doorgestuurd naar /afspraken
        $response->assertRedirect('/google/redirect');
    }
}
