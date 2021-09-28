<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Club::factory()->count(20)->create();
    }
}
