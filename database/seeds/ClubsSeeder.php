<?php

use Illuminate\Database\Seeder;
use App\Models\Club;

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
