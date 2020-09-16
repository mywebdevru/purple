<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserBoxDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_users_data()
    {
        $response = $this->get('/api/users-count');
        $response->assertRedirect('login');;
    }

    public function only_admin_users_can_fetch_users_data()
    {

    }
}
