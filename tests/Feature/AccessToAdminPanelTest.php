<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessToAdminPanelTest extends TestCase
{
    public function testUserMustLoginToAccessToAdminPanel()
    {
        $this->get(route('admin.index'))->assertRedirect('login');
        $this->get(route('admin.user.index'))->assertRedirect('login');
        $this->get(route('admin.post.index'))->assertRedirect('login');
    }

    public function testUsersCannotAccessToAdminPanel()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('admin.index'));

        $response->assertForbidden();
    }

    public function testAdminCanAccessToAdminPanel()
    {
        $adminUser = factory(User::class)->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        $response = $this->get(route('admin.index'));

        $response->assertOk();
    }
}
