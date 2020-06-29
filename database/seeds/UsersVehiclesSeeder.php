<?php

use App\UsersVehicles;
use Illuminate\Database\Seeder;
use App\User;

class UsersVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsersVehicles::class, App\User::all()->count()*2)->create();
    }
}
