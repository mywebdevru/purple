<?php

use App\Models\User;

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
