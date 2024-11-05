<?php

namespace Tests\Feature;

use App\Models\Account;
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
        $result = Account::factory()->count(10)->state(new Sequence(
            ['admin' => 0],
            ['admin' => 1],
        ))->create();
        $this->assertCount(10, $result);
    }
}
