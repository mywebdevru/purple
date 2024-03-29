<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AccessToProfileEditTest extends TestCase
{
    use RefreshDatabase;

    public function testUserMustLoginToViewProfileEdit()
    {
        $this->get(route('user.edit', 1))->assertRedirect('login');
        $this->get(route('user.edit', 10))->assertRedirect('login');
    }

    public function testAdminCanViewProfilesEditPages()
    {
        $adminUser = User::factory()->create();
        User::factory()->count(10)->create();

        Role::create(['name' => 'admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response1 = $this->get(route('user.edit', 1));
        $response2 = $this->get(route('user.edit', 10));

        $response1->assertOk();
        $response2->assertOk();
    }

    public function testUserCanViewOwnProfileEdit()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get(route('user.edit', $user->id));

        $response->assertStatus(200);
    }

    public function testUserCantViewOthersUsersProfileEdit()
    {
        $this->actingAs($user = User::factory()->create());
        $user2 = User::factory()->create();

        $response = $this->get(route('user.edit', $user2->id));

        $response->assertStatus(403);
    }
}
