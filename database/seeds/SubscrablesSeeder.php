<?php

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
    public function run()
    {
        foreach(User::all() as $user){
            $user->subscribesToUsers()->attach($user);
        }
        factory(Subscrable::class, User::all()->count()*3)->create();
    }
}
