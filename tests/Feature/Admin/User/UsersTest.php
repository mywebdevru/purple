<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

test('guests_cant_fetch_users', function () {
    $response = $this->get('/api/users', ['Accept' => 'application/json']);
    $response->assertStatus(401);
});

test('users_cant_fetch_users', function () {
    /* @var \Tests\TestCase $this */

    $this->actingAs(factory(User::class)->create(), 'api');
    $response = $this->get('/api/users');
    $response->assertForbidden();
});

test('admin_can_fetch_users', function () {
    /* @var \Tests\TestCase $this */

    $adminUser = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $adminUser->assignRole('admin');

    $this->actingAs($adminUser, 'api');

    $response = $this->get('/api/users');
    $response->assertOk();
});

test('super_admin_can_fetch_users', function () {
    /* @var \Tests\TestCase $this */

    $superAdminUser = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $superAdminUser->assignRole('super-admin');

    $this->actingAs($superAdminUser, 'api');

    $response = $this->get('/api/users');
    $response->assertOk();
});


