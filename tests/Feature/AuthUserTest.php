<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
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

        $this->actingAs($user = User::factory()->create(), 'api');

        $response = $this->get('/api/auth-user');

        $response->assertStatus(200)->assertJson([
            'data' => [
                'user_id' => $user->id,
                'attributes' => [
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'avatar' => $user->avatar,
                    'wallpaper' =>$user->wallpaper,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'gender' => $user->gender,
                    'city' => $user->city,
                    'country' => $user->country,
                    'creed' => $user->creed,
                ],
            ],
            'links' => [
                'self' => url('/user/' . $user->id),
            ],
        ]);
    }
}
