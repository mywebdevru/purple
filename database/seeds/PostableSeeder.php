<?php

use App\Postable;
use App\Post;
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
        factory(Postable::class, Post::all()->count())->create();
    }
}
