<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
            $comments = factory(Comment::class, rand(1, 10))->make();
            $comments->each(function ($comment) {
                $comment->authorable_id = rand(1, User::count());
                $comment->authorable_type = 'App\Models\User';
            });
            $post->comments()->saveMany($comments);
        });
    }
}
