<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
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

    /** @test */
    public function users_cant_fetch_unread_notifications()
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $response = $this->get('/api/notifications/unread');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_unread_notifications()
    {

        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications/unread');
        $response->assertOk();
    }

    /** @test */
    public function super_admins_can_fetch_unread_notifications()
    {

        $superAdminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/notifications/unread');
        $response->assertOk();
    }
}
