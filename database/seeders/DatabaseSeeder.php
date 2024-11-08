<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Deze seeder roept beide seeders aan
        $this->call([
            AccountSeeder::class,
            AppointmentSeeder::class
        ]);
    }
}
