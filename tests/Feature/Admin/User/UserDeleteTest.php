<?php

test('guests_cant_delete_user', function () {
    /* @var \Tests\TestCase $this */

    $response = $this->delete('/api/users/delete', [], ['Accept' => 'application/json']);
    $response->assertStatus(401);
});
