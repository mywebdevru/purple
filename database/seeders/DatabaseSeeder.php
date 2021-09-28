<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(UsersVehiclesSeeder::class);
        $this->call(FriendsSeeder::class);
        $this->call(ClubsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(FeedSeeder::class);
        $this->call(SubscrablesSeeder::class);
        $this->call(FriendshipRequestSeeder::class);
    }
}
