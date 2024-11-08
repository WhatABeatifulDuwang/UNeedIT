<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::factory()
            ->count(20)
            // Geeft elke afspraak verschillende type namen
            ->state(new Sequence(
                ['device_name' => 'iPhone'],
                ['device_name' => 'iPad'],
                ['device_name' => 'Samsung'],
                ['device_name' => 'ASUS'],
                ['device_name' => 'HP'],
                ['device_name' => 'Xiaomi'],
                ['device_name' => 'Huawei'],
                ['device_name' => 'Blackberry'],
                ['device_name' => 'Lenovo'],
                ['device_name' => 'Oppo'],
                ['device_name' => 'Apple'],
                ['device_name' => 'Linux'],
                ['device_name' => 'Windows'],
            ))
            // Geeft elke afspraak een verschillende type apparaat
            ->state(new Sequence(
                ['device_type' => 'Laptop'],
                ['device_type' => 'Phone'],
                ['device_type' => 'Tablet'],
                ['device_type' => 'Desktop'],
                ['device_type' => 'Other']
            ))
            ->create();
    }
}
