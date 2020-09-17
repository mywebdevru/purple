<?php

namespace Tests\Feature\Admin;

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
}
