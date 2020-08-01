<?php

use Illuminate\Database\Seeder;
use App\Club;
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
        factory(Club::class, 20)->create();
    }
}
