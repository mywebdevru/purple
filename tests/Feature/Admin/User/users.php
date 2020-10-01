<?php

test('guests_cant_fetch_users', function () {
    $response = $this->get('/api/users', ['Accept' => 'application/json']);
    $response->assertStatus(401);
});
