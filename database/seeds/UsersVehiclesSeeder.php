<?php

use App\User;
use App\UserVehicle;
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
        factory(UserVehicle::class, User::all()->count()*2)->create();
    }
}
