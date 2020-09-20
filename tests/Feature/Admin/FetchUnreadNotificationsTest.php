<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchUnreadNotificationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_unread_notifications()
    {
        $response = $this->get('/api/notifications/unread', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }
}
