<?php

namespace Database\Seeders;

use App\Models\FriendshipRequest;
use App\Models\User;
use Illuminate\Database\Seeder;

class FriendshipRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FriendshipRequest::factory()->count(User::count()*2)->create();
    }
}
