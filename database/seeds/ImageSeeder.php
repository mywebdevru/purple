<?php

use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Image::class, 300)->create()->each(function (Image $image){
            $comments = factory(Comment::class, rand(1, 10))->make();
            $comments->each(function ($comment) {
                $comment->authorable_id = rand(1, User::count());
                $comment->authorable_type = 'App\Models\User';
            });
            $image->comments()->saveMany($comments);
        });
    }
}
