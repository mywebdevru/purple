<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testProfilePageTest()
    {
        $response1 = $this->get(route('user.show', 1));
        $response2 = $this->get(route('user.show', 10));
        $response3 = $this->get(route('user.show', 20));

        $response1->assertStatus(200);
        $response2->assertStatus(200);
        $response3->assertStatus(200);
    }
}
