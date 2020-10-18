<?php

use App\Models\Message;
use App\Models\User;

test('a_user_can_send_a_message', function () {
    /* @var \Tests\TestCase $this */

    $this->withoutExceptionHandling();

    $this->actingAs($user = factory(User::class)->create(), 'api');
    $anotherUser = factory(User::class)->create();

    $response = $this->post('/api/messages', [
        'recipient_id' => $anotherUser->id,
        'body' => 'Test message',
    ]);

    $response->assertStatus(201);

    $message = Message::first();

    $this->assertCount(1, Message::all());
    $this->assertEquals($user->id, $message->user_id);
    $this->assertEquals($anotherUser->id, $message->recipient_id);
    $this->assertEquals('Test message', $message->body);
    $response->assertJson([
        'data' => [
            'type' => 'messages',
            'message_id' => $message->id,
            'attributes' => [
                'sent_by' => [
                    'data' => [
                        'attributes' => [
                            'name' => $user->name,
                        ],
                    ],
                ],
                'sent_to' => [
                    'data' => [
                        'attributes' => [
                            'name' => $anotherUser->name,
                        ],
                    ],
                ],
                'body' => 'Test message',
            ],
        ],
        'links' => [
            'self' => url('/messages/' . $message->id),
        ],
    ]);
});
