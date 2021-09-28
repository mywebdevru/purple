<?php

namespace Database\Seeders;

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
     * @throws \Exception
     */
    public function run(): void
    {
        Image::factory()->count(300)->create()->each(function (Image $image){
            $comments = Comment::factory()->count(random_int(1, 10))->make();
            $comments->each(function ($comment) {
                $comment->authorable_id = random_int(1, User::count());
                $comment->authorable_type = User::class;
            });
            $image->comments()->saveMany($comments);
        });
    }
}
