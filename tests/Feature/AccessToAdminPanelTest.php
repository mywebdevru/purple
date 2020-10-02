<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AccessToAdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function testUserMustLoginToAccessToAdminPanel()
    {
        $this->get('/admin')->assertRedirect('login');
        $this->get('/admin/users')->assertRedirect('login');
    }

    public function testUsersCannotAccessToAdminPanel()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/admin');

        $response->assertForbidden();
    }

    public function testAdminCanAccessToAdminPanel()
    {
        $adminUser = factory(User::class)->create();

        Role::create(['name' => 'admin']);

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response = $this->get('/admin');

        $response->assertOk();
    }

    public function testSuperAdminCanAccessToAdminPanel()
    {
        $superAdminUser = factory(User::class)->create();

        Role::create(['name' => 'super-admin']);

        $superAdminUser->assignRole('super-admin');

        $this->actingAs($superAdminUser);

        $response = $this->get('/admin');

        $response->assertOk();
    }
}
