<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function testUserMustLoginToViewProfiles()
    {
        $this->get(route('user.show', 1))->assertRedirect('login');
        $this->get(route('user.show', 10))->assertRedirect('login');
    }

    public function testAdminCanViewProfiles()
    {
        $adminUser = User::factory()->create();
        User::factory()->count(2)->create();

        Role::create(['name' => 'admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response = $this->get(route('user.show', 2));

        $response->assertOk();
    }

    public function testUserCanViewProfiles()
    {
        $user = User::factory()->create();
        User::factory()->create();

        $this->actingAs($user);

        $response1 = $this->get(route('user.show', 1));
        $response2 = $this->get(route('user.show', 2));


        $response1->assertStatus(200);
        $response2->assertStatus(200);

    }

    public function testUserCanViewOwnProfile()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('user.show', $user->id));

        $response->assertStatus(200);
    }
}
