<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberBoxApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_fetch_members_data()
    {
        $response = $this->get('/api/members-count', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    /** @test */
    public function users_cant_fetch_members_data()
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $response = $this->get('/api/members-count');
        $response->assertForbidden();
    }
}
