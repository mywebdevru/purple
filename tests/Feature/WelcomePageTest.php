<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class WelcomePageTest extends TestCase
{

    use RefreshDatabase;

    public function testGuestCanViewWelcomePage()
    {
        $this->get(route('welcome'))->assertStatus(200);
    }

    public function testAdminCanViewWelcomePage()
    {
        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $this->get(route('welcome'))->assertStatus(200);
    }

    public function testUserCanViewProfiles()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get(route('welcome'))->assertStatus(200);
    }
}
