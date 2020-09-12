<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthUserTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function authenticated_user_can_be_fetched()
    {
        /** @var $user User */

        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(User::class)->create(), 'api');

        $response = $this->get('/api/auth-user');

        $response->assertStatus(200)->assertJson([
            'data' => [
                'user_id' => $user->id,
                'attributes' => [
                    'name' => $user->name,
                    'avatar' => $user->avatar,
                ],
            ],
            'links' => [
                'self' => url('/users/' . $user->id),
            ],
        ]);
    }
}
