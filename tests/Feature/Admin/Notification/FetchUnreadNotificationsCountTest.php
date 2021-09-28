<?php

namespace Tests\Feature\Admin\Notification;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class FetchUnreadNotificationsCountTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function guests_cant_fetch_unread_notifications()
    {
        $response = $this->get('/api/notifications/unread-count', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_fetch_unread_notifications()
    {
        $this->actingAs(User::factory()->create(), 'api');
        $response = $this->get('/api/notifications/unread-count');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_unread_notifications()
    {
        $adminUser = User::factory()->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        User::factory()->count(3)->create();

        $response = $this->get('/api/notifications/unread-count');
        $response->assertOk()->assertJson([
            'title' => 'Unread notifications count',
        ]);
    }

    /** @test */
    public function super_admins_can_fetch_unread_notifications()
    {

        $superAdminUser = User::factory()->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        User::factory()->count(7)->create();

        $response = $this->get('/api/notifications/unread-count');
        $response->assertOk()->assertJson([
            'title' => 'Unread notifications count',
        ]);
    }
}
