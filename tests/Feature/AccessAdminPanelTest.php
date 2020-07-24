<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessAdminPanelTest extends TestCase
{
    public function testUserMustLoginToAccessAdminPanel()
    {
        $this->get(route('admin.index'))->assertRedirect('login');
        $this->get(route('admin.user.index'))->assertRedirect('login');
        $this->get(route('admin.post.index'))->assertRedirect('login');
    }

    public function testCanUserAccessAdminPanel()
    {

    }
}
