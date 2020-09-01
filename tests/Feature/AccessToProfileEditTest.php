<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessToProfileEditTest extends TestCase
{
    public function testUserMustLoginToViewProfileEdit()
    {
        $this->get(route('user.show', 1))->assertRedirect('login');
        $this->get(route('user.show', 10))->assertRedirect('login');
    }
}
