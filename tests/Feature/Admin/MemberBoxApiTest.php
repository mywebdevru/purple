<?php

namespace Tests\Feature\Admin;

use App\Models\Club;
use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MemberBoxApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_members_data()
    {
        $response = $this->get('/api/members-count', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_fetch_members_data()
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $response = $this->get('/api/members-count');
        $response->assertForbidden();
    }

    /** @test */
    public function admins_can_fetch_members_data()
    {
        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');

        $response = $this->get('/api/members-count');
        $response->assertOk();
    }

    /** @test */
    public function super_admins_can_fetch_members_data()
    {

        $superAdminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser, 'api');

        $response = $this->get('/api/members-count');
        $response->assertOk();
    }

    /** @test */
    public function members_count_response_json_test()
    {
        $adminUser = factory(User::class)->create();
        Role::create(['name' => 'admin']);
        $adminUser->assignRole('admin');

        $this->actingAs($adminUser, 'api');
        factory(User::class, 10)->create();
        factory(Club::class, 10)->create();
        factory(Group::class, 10)->create();

        $response = $this->get('/api/members-count');
        $response->assertOk()->assertJson([
            'type' => 'Members Count',
            'data' => [
                'count' => 31,
                'member_types' => [
                    'users' => 11,
                    'clubs' => 10,
                    'groups' => 10,
                ],
            ],
        ]);
    }
}
