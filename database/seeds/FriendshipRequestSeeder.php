<?php

use App\FriendshipRequest;
use App\User;
use Illuminate\Database\Seeder;

class FriendshipRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FriendshipRequest::class, User::all()->count()*2)->create();
    }
}
