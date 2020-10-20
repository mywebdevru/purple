<?php

use App\Models\Friend;
use App\Models\Message;
use App\Models\User;

test('a_user_can_send_a_message', function () {
    /* @var \Tests\TestCase $this */

    $this->actingAs($user = factory(User::class)->create(), 'api');
    $anotherUser = factory(User::class)->create(['id' => 123]);

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

test('a_user_can_get_his_friends', function () {
    /* @var \Tests\TestCase $this */

    $this->actingAs($user = factory(User::class)->create(), 'api');
    $firstUsersFriend = factory(User::class)->create(['id' => 123]);
    $secondUsersFriend = factory(User::class)->create(['id' => 234]);
    Friend::create(['user_id' => $user->id, 'friend_id' => $firstUsersFriend->id]);
    Friend::create(['user_id' => $user->id, 'friend_id' => $secondUsersFriend->id]);
    $response = $this->get('/api/auth-user-friends');

    $response->assertOk();
    $response->assertJsonCount(2);
    $response->assertJson([
        'data' => [
            [
                'data' => [
                    'type' => 'users',
                    'user_id' => $firstUsersFriend->id,
                    'attributes' => [
                        'name' => $firstUsersFriend->name,
                    ],
                ],
                'links' => [
                    'self' => url('/users/' . $firstUsersFriend->id),
                ],
            ],
            [
                'data' => [
                    'type' => 'users',
                    'user_id' => $secondUsersFriend->id,
                    'attributes' => [
                        'name' => $secondUsersFriend->name,
                    ],
                ],
                'links' => [
                    'self' => url('/users/' . $secondUsersFriend->id),
                ],
            ],
        ],
        'links' => [
            'self' => url('/users'),
        ]
    ]);
});

test('a_user_can_fetch_chat_messages', function () {
    /* @var \Tests\TestCase $this */

    $this->withoutExceptionHandling();

    $this->actingAs($user = factory(User::class)->create(), 'api');
    $anotherUser = factory(User::class)->create(['id' => 123]);

    $message1 = Message::create([
        'user_id' => $user->id,
        'recipient_id' => $anotherUser->id,
        'body' => 'First user message',
    ]);
    $message2 = Message::create([
        'user_id' => $anotherUser->id,
        'recipient_id' => $user->id,
        'body' => 'Second user message',
    ]);
    Message::create([
        'user_id' => $user->id,
        'recipient_id' => 256,
        'body' => 'Third user message',
    ]);

    $response = $this->get('/api/messages', ['user_id' => $anotherUser->id]);

    $response->assertOk();
    $response->assertJsonCount(2);
    $response->assertJson([
        'data' => [
            [
                'data' => [
                    'type' => 'messages',
                    'message_id' => $message2->id,
                    'attributes' => [
                        'sent_by' => [
                            'data' => [
                                'user_id' => $anotherUser->id,
                                'type' => 'users',
                                'attributes' => [
                                    'name' => $anotherUser->name,
                                ],
                            ],
                        ],
                        'sent_to' => [
                            'data' => [
                                'user_id' => $user->id,
                                'type' => 'users',
                                'attributes' => [
                                    'name' => $user->name,
                                ],
                            ],
                        ],
                        'body' => $message2->body,
                        'sent_at' => $message2->created_at->diffForHumans(),
                    ],
                ],
                'links' => [
                    'self' => url('/messages/' . $message2->id),
                ],
            ],
            [
                'data' => [
                    'type' => 'messages',
                    'message_id' => $message1->id,
                    'attributes' => [
                        'sent_by' => [
                            'data' => [
                                'user_id' => $user->id,
                                'type' => 'users',
                                'attributes' => [
                                    'name' => $user->name,
                                ],
                            ],
                        ],
                        'sent_to' => [
                            'data' => [
                                'user_id' => $anotherUser->id,
                                'type' => 'users',
                                'attributes' => [
                                    'name' => $anotherUser->name,
                                ],
                            ],
                        ],
                        'body' => $message1->body,
                        'sent_at' => $message1->created_at->diffForHumans(),
                    ],
                ],
                'links' => [
                    'self' => url('/messages/' . $message1->id),
                ],
            ],
        ],
        'links' => [
            'self' => url('/messages'),
        ],
    ]);

});
