<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UsersVehiclesSeeder::class);
        $this->call(FriendsSeeder::class);
        $this->call(ClubsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(SubscrablesSeeder::class);
        $this->call(FriendshipRequestSeeder::class);
    }
}
