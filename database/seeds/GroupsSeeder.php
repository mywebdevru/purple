<?php

use App\Groups;
use App\User;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Groups::class, (User::all()->count())/5)->create();
    }
}
