<?php

namespace Tests\Feature\Admin\Notification;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\DatabaseNotification;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class FetchNotificationsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions
        $this->app->make(PermissionRegistrar::class)->registerPermissions();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);
    }

    /** @test */
    public function guests_cant_fetch_notifications()
    {
        $response = $this->get('/api/notifications', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_fetch_notifications()
    {
        $this->actingAs(User::factory()->create(), 'api');
        $response = $this->get('/api/notifications');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_notifications()
    {

        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications');
        $response->assertOk();
    }

    /** @test */
    public function super_admins_can_fetch_notifications()
    {

        $superAdminUser = User::factory()->create();

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/notifications');
        $response->assertOk();
    }

    /** @test */
    public function admin_can_get_user_created_notifications()
    {
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        User::factory()->create();

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/notifications');
        $response->assertOk()->assertJson([
            'data' => [],
            'links' => [
                'self' => url('/admin/notifications'),
            ]
        ]);
    }

    /** @test */
    public function admin_can_get_user_created_and_updated_notifications()
    {
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $user = User::factory()->create();

        $this->actingAs($adminUser, 'api');

        $notification_created = DatabaseNotification::all()->first();

        $user->update([
            'name' => 'PHPUnit',
        ]);

        $notification_updated = DatabaseNotification::all()->last();;

        $response = $this->get('/api/notifications');

        $response->assertOk();
    }
}
