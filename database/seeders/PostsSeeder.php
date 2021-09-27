<?php

namespace Database\Seeders;

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
     * @throws \Exception
     */
    public function run(): void
    {
        Post::factory()->count(300)->create()->each(function (Post $post){
            $comments = Comment::factory(random_int(1, 10))->make();
            $comments->each(function ($comment) {
                $comment->authorable_id = random_int(1, User::count());
                $comment->authorable_type = User::class;
            });
            $post->comments()->saveMany($comments);
        });
    }
}
