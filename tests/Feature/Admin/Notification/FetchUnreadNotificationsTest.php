<?php

namespace Tests\Feature\Admin\Notification;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /** @test */
    public function admin_get_only_unread_notifications()
    {

        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        factory(User::class, 3)->create();

        $this->actingAs($adminUser, 'api');

        $adminUser->notifications()->first()->markAsRead();

        $response = $this->get('/api/notifications/unread');
        $response->assertOk()->assertJson([
            'count' => 2,
            'links' => [
                'self' => url('/admin/notifications'),
            ]
        ]);
    }


    /** @test */
    public function admin_have_limit_for_unread_notifications_fetching()
    {
        $this->withoutExceptionHandling();

        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        factory(User::class, 10)->create();

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications/unread');

        $response->assertOk()->assertJson([
            'count' => 5,
            'links' => [
                'self' => url('/admin/notifications'),
            ]
        ]);
    }
}
