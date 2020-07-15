<?php

use App\Postables;
use App\Posts;
use Illuminate\Database\Seeder;

class PostableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Postables::class, Posts::all()->count())->create();
    }
}
