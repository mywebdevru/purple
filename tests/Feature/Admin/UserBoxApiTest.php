<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserBoxApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_users_data()
    {
        $response = $this->get('/api/users-count', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_fetch_users_data()
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $response = $this->get('/api/users-count');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_users_data()
    {
        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/users-count');
        $response->assertOk();
    }

    /** @test */
    public function super_admins_can_fetch_users_data()
    {

        $superAdminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/users-count');
        $response->assertOk();
    }

    /** @test */
    public function users_count_response_json_test()
    {
        $this->withoutExceptionHandling();
        $adminUser = factory(User::class)->create();
        $superAdminUser = factory(User::class)->create();
        factory(User::class, 10)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');
        $superAdminUser->assignRole('super-admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/users-count');
        $response->assertOk()->assertJson([
            'type' => 'Users Count',
            'data' => [
                'count' => 12,
                'user_roles' => [
                    'admin' => 1,
                    'super-admin' => 1,
                ]
            ],
        ]);
    }

}
