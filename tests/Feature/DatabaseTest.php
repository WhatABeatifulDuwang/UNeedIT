<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    use CreatesApplication;

    public function test_account_database()
    {
        // Maakt accounts aan in de database
        $result = Account::factory()->count(10)->state(new Sequence(
            ['admin' => 0],
            ['admin' => 1],
        ))->create();
        // Kijkt of er 10 entries zijn aangemaakt in accounts
        $this->assertCount(10, $result);
    }

    public function test_appointment_database()
    {
        // Maakt accounts aan in de database om account id te kunnen linken aan appointments
        Account::factory()->count(10)->state(new Sequence(
            ['admin' => 0],
            ['admin' => 1],
        ))->create();
        // Maakt appointments aan in de database
        $appointments = Appointment::factory()->count(10)->state(new Sequence(
            ['device_type' => 'Phone'],
            ['device_type' => 'Laptop'],
            ['device_type' => 'Tablet'],
        ))->state(new Sequence(
            ['device_name' => 'Apple'],
            ['device_name' => 'Android'],
            ['device_name' => 'Windows'],
        ))->create();
        // Kijkt of er 10 entries zijn gemaakt in appointments
        $this->assertCount(10, $appointments);
    }
}
