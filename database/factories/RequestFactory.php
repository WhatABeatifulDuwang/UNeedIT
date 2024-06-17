<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'device_name' => new Sequence(['iPhone', 'iPad', 'ASUS', 'MSI', 'Samsung', 'HP']),
            'device_type' => new Sequence(['Phone', 'Tablet', 'Laptop']),
            'description' => $this->faker->words
        ];
    }
}
