<?php

use Illuminate\Database\Seeder;
use App\Clubs;
use App\User;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Clubs::class, 20)->create();
    }
}
