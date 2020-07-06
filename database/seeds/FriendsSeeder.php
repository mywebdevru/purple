<?php

use App\Friends;
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
        factory(Friends::class, User::all()->count())->create();
    }
}
