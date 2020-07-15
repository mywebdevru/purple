<?php

use App\Subscrable;
use App\User;
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
        factory(Subscrable::class, (User::all()->count())/5)->create();
    }
}
