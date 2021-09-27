<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Seeder;
use App\Models\User;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Friend::class, User::all()->count()*3)->create()->each(function ($friend) {
            $user = User::find($friend->friend_id);
            $user->friends()->create(['friend_id' => $friend->user_id,]);
            $user->subscribesToUsers()->attach($friend->friend_id);
            User::find($friend->friend_id)->subscribesToUsers()->attach($friend->user_id);
        });
    }
}
