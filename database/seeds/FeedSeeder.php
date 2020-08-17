<?php

use App\Models\Image;
use App\Models\Post;
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
            $post->feed()->create()->update(['created_at' => $post->created_at, 'updated_at' => $post->updated_at]);
        }

        foreach(Image::all() as $post) {
            $post->feed()->create()->update(['created_at' => $post->created_at, 'updated_at' => $post->updated_at]);;

        }

    }
}
