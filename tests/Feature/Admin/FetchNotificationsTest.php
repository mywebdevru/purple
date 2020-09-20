<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
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

    /** @test */
    public function users_cant_fetch_notifications()
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $response = $this->get('/api/notifications');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_notifications()
    {
        $this->withoutExceptionHandling();

        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications');
        $response->assertOk();
    }

    /** @test */
    public function super_admins_can_fetch_notifications()
    {
        $this->withoutExceptionHandling();

        $superAdminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/notifications');
        $response->assertOk();
    }

    /** @test */
    public function admin_can_get_user_created_notifications()
    {
        $this->withoutExceptionHandling();

        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $user = factory(User::class)->create();

        $this->actingAs($adminUser, 'api');

        $notification = $adminUser->notifications()->first();

        $this->assertEquals('App\Notifications\User\UserCreated', $notification->type);
        $this->assertEquals('App\Models\User', $notification->notifiable_type);
        $this->assertEquals($adminUser->id, $notification->notifiable_id);

        $response = $this->get('/api/notifications');
        $response->assertOk()->assertJson([
            'data' => [
                [
                    'data' => [
                        'type' => 'notifications',
                        'notification_id' => $notification->id,
                        'attributes' => [
                            'type' => 'App\Notifications\User\UserCreated',
                            'created_at' => $notification->created_at->diffForHumans(),
                            'resd_at' => optional($notification->created_at)->diffForHumans(),
                        ],
                    ],
                    'links' => [
                        'self' => url('/admin/notifications' . $notification->id),
                    ],
                ]
            ],
            'links' => [
                'self' => url('/admin/notifications'),
            ]
        ]);
    }
}