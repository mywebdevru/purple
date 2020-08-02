<?php

namespace Tests\Feature;


use App\Post;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SummernoteImageUploadTest extends TestCase
{
    public function SummernoteUploadFile()
    {
        $response = $this->call('post', route('summernote.upload'),
            [
                'files' => [
                    UploadedFile::fake()->image('test.jpg'),
                ],
                'post' => factory(Post::class)->create(),
            ],
            [
                'Content-Type' => 'multipart/form-data',
            ],
        );

        $response->assertOk();
        $response->assertJsonFragment(['summernote']);
    }
}
