<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    // Onderstaande testen zijn gemaakt op te kijken of het mogelijk is om elke pagina van de website te bezoeken
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_overons()
    {
        $response = $this->get('/overOns');

        $response->assertStatus(200);
    }

    public function test_service()
    {
        $response = $this->get('/service');

        $response->assertStatus(200);
    }

    public function test_contact()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_faq()
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }

    public function test_bezorgdiensten()
    {
        $response = $this->get('/bezorgdiensten');

        $response->assertStatus(200);
    }

    public function test_afspraken()
    {
        // Maakt een account aan om in een afgeschermd gedeelte te komen
        $account = Account::factory()->state(['admin' => 0])->create();
        $this->actingAs($account);
        $response = $this->get('/afspraken');
        $response->assertStatus(200);
    }

    public function test_webshop()
    {
        // Maakt een account aan om in een afgeschermd gedeelte te komen
        $account = Account::factory()->state(['admin' => 0])->create();
        $this->actingAs($account);
        $response = $this->get('/webshop');
        $response->assertStatus(200);
    }
}
