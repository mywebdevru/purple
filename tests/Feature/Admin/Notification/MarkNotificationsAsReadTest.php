<?php

namespace Tests\Feature\Admin\Notification;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MarkNotificationsAsReadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_mark_all_notifications()
    {
        $response = $this->get('/api/notifications/all-read', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_mark_all_notifications()
    {
        $this->actingAs(User::factory()->create(), 'api');
        $response = $this->get('/api/notifications/all-read');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_mark_all_notifications()
    {

        $adminUser = User::factory()->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        User::factory()->count(3)->create();

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications/all-read');

        $this->assertEquals(0, $adminUser->unreadNotifications()->count());

        $response->assertStatus(204);
    }

    /** @test */
    public function super_admins_can_fetch_unread_notifications()
    {

        $superAdminUser = User::factory()->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/notifications/all-read');

        $response->assertStatus(204);
    }
}
