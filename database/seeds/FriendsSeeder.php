<?php

use App\Friend;
use Illuminate\Database\Seeder;
use App\User;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Friend::class, User::all()->count()*3)->create();
    }
}
