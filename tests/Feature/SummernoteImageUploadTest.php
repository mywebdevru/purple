<?php

namespace Tests\Feature;


use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SummernoteImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function testSummernoteUploadFile()
    {
        $this->withoutExceptionHandling();
        $response = $this->call('post', route('summernote.upload'),
            [
                'files' => [
                    UploadedFile::fake()->image('test.jpg'),
                ],
                'post' => factory(Post::class)->create()->id,
            ],
            [
                'Content-Type' => 'multipart/form-data',
            ],
        );

        $response->assertOk();
        $response->assertJsonFragment(['summernote']);
    }
}
