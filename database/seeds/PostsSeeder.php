<?php

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 300)->create()->each(function (Post $post){
            $comments = factory(Comment::class, 3)->make(['authorable_id' => $post->postable_id, 'authorable_type' => $post->postable_type]);
            $post->comments()->saveMany($comments);
        });
    }
}
