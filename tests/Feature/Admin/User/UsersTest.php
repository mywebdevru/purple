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

it('get_proper_users_json', function () {
    /* @var \Tests\TestCase $this */

    $superAdminUser = factory(User::class)->create();
    $user = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $superAdminUser->assignRole('super-admin');

    $this->actingAs($superAdminUser, 'api');

    $response = $this->get('/api/users');

    $response->assertJsonCount(2)->assertJson([
        'data' => [
            [
                'data' => [
                    'attributes' => [
                        'avatar' => $superAdminUser->avatar,
                        'name' => $superAdminUser->name,
                        'email' => $superAdminUser->email,
                    ],
                    'type' => 'users',
                    'user_id' => $superAdminUser->id,
                ],
                'links' => [
                    'self' => url('/users/' . $superAdminUser->id),
                ],
            ],
            [
                'data' => [
                    'attributes' => [
                        'avatar' => $user->avatar,
                        'name' => $user->name,
                        'email' => $user->email,
                    ],
                    'type' => 'users',
                    'user_id' => $user->id,
                ],
                'links' => [
                    'self' => url('/users/' . $user->id),
                ],
            ],
        ],
        'links' => [
            'self' => url('/users')
        ]
    ]);

});


