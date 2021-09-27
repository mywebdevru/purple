<?php

namespace Database\Seeders;

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
        foreach(Post::all() as $item) {
            $item->feed()
                ->create()
                ->update(['created_at' => $item->created_at, 'updated_at' => $item->updated_at, 'authorable_id' => $item->postable_id, 'authorable_type' => $item->postable_type]);
        }

        foreach(Image::all() as $item) {
            $item->feed()
                ->create()
                ->update(['created_at' => $item->created_at, 'updated_at' => $item->updated_at, 'authorable_id' => $item->imageable_id, 'authorable_type' => $item->imageable_type]);

        }

    }
}
