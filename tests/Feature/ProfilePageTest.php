<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    public function testUserMustLoginToViewProfiles()
    {
        $this->get(route('user.show', 1))->assertRedirect('login');
        $this->get(route('user.show', 10))->assertRedirect('login');
    }

    public function testAdminCanViewProfiles()
    {
        $adminUser = factory(User::class)->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response = $this->get(route('user.show', 10));

        $response->assertOk();
    }

    public function testUserCanViewProfiles()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response1 = $this->get(route('user.show', 1));
        $response2 = $this->get(route('user.show', 20));


        $response1->assertStatus(200);
        $response2->assertStatus(200);

    }

    public function testUserCanViewOwnProfile()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('user.show', $user->id));

        $response->assertStatus(200);
    }
}
