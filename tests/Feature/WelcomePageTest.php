<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    public function testGuestCanViewWelcomePage()
    {
        $this->get(route('welcome'))->assertStatus(200);
    }
}
