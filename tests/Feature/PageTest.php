<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
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
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
