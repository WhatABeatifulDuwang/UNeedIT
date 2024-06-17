<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class AccountSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Account::factory()
            ->count(10)
            ->state(new Sequence(
                ['admin' => 0],
                ['admin' => 1],
            ))
            ->create();
    }
}
