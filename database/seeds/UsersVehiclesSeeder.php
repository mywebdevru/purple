<?php

use App\User;
use App\UsersVehicles;
use Illuminate\Database\Seeder;

class UsersVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsersVehicles::class, User::all()->count()*2)->create();
    }
}
