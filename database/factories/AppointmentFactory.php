<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'device_name' => fake()->name(),
            'device_type' => fake()->word,
            'description' => $this->faker->word,
            'appointment_date' => $this->faker->dateTimeBetween('-5 years','+5 months'),
            'appointment_time' => $this->faker->time(),
            'place_of_appointment' => $this->faker->address(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'account_id' => $this->faker->randomElement(Account::pluck('id')),
        ];
    }
}
                