<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Request::factory()
            ->count(10)
            ->state(new Sequence(
                ['device_name' => 'iPhone'],
                ['device_name' => 'iPad'],
                ['device_name' => 'Samsung'],
                ['device_name' => 'ASUS'],
                ['device_name' => 'HP'],
                ['device_name' => 'Xiaomi']
            ))
            ->state(new Sequence(
                ['device_type' => 'Laptop'],
                ['device_type' => 'Phone'],
                ['device_type' => 'Tablet']
            ))
            ->create();
    }
}
