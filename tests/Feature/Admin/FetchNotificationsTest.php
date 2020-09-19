<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchNotificationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_notifications()
    {
        $response = $this->get('/api/notifications', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }
}
