<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

test('guests_cant_delete_user', function () {
    /* @var \Tests\TestCase $this */

    $response = $this->delete('/api/users/delete', [], ['Accept' => 'application/json']);
    $response->assertStatus(401);
});

test('users_cant_delete_user', function () {
    /* @var \Tests\TestCase $this */

    $this->actingAs(factory(User::class)->create(), 'api');
    $response = $this->delete('/api/users/delete', []);
    $response->assertForbidden();
});

test('admins_can_delete_user', function () {
    /* @var \Tests\TestCase $this */

    $adminUser = factory(User::class)->create();
    $superAdminUser = factory(User::class)->create();
    $user1 = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $adminUser->assignRole('admin');
    $superAdminUser->assignRole('super-admin');

    $this->actingAs($adminUser, 'api');

    $response = $this->delete('/api/users/delete', ['user_id' => $user1->id]);
    $response->assertStatus(204);

    $this->actingAs($superAdminUser, 'api');

    $response = $this->delete('/api/users/delete', ['user_id' => $adminUser->id]);
    $response->assertStatus(204);
});

test('user_can_be_deleted', function () {
    /* @var \Tests\TestCase $this */

    $adminUser = factory(User::class)->create();
    $user = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $adminUser->assignRole('admin');

    $this->actingAs($adminUser, 'api');

    $response = $this->delete('/api/users/delete', ['user_id' => $user->id]);

    $this->assertEquals(1, User::count());
    $this->assertNull(User::find($user->id));
    $response->assertStatus(204);
});

test('only_super_admin_can_delete_admin', function () {
    /* @var \Tests\TestCase $this */

    $adminUser1 = factory(User::class)->create();
    $adminUser2 = factory(User::class)->create();
    $superAdminUser = factory(User::class)->create();

    Role::create(['name' => 'admin']);
    Role::create(['name' => 'super-admin']);

    $adminUser1->assignRole('admin');
    $adminUser2->assignRole('admin');
    $superAdminUser->assignRole('super-admin');

    $this->actingAs($adminUser1, 'api');
    $response = $this->delete('/api/users/delete', ['user_id' => $adminUser2->id]);
    $response->assertForbidden();

    $this->actingAs($superAdminUser, 'api');
    $response = $this->delete('/api/users/delete', ['user_id' => $adminUser1->id]);
    $response->assertStatus(204);
});
