<?php

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
        factory(Friend::class, User::all()->count()*3)->create();
    }
}
