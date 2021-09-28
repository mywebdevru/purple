<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserVehicle;
use Illuminate\Database\Seeder;

class UsersVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserVehicle::factory()->count(User::count()*2)->create();
        User::all()->searchable();
    }
}
