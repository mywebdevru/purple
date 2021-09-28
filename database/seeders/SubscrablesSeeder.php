<?php

namespace Database\Seeders;

use App\Models\Subscrable;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubscrablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach(User::all() as $user){
            $user->subscribesToUsers()->attach($user);
        }
        Subscrable::factory()->count(User::count()*3)->create();
    }
}
