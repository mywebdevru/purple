<?php

use App\Postable;
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
        factory(Postable::class, Posts::all()->count())->create();
    }
}
