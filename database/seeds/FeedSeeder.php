<?php

use App\Image;
use App\Post;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Post::all() as $post) {
            $post->feed()->create();
        }

        foreach(Image::all() as $post) {
            $post->feed()->create();
        }

    }
}
