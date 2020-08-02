<?php

namespace Tests\Feature;


use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SummernoteImageUploadTest extends TestCase
{
    public function testSummernoteUploadFile()
    {
        $response = $this->call('post', route('summernote.upload'),
            [
                'files' => [
                    UploadedFile::fake()->image('test.jpg'),
                ],
            ],
            [
                'Content-Type' => 'multipart/form-data',
            ],
        );

        $response->assertOk();
        $response->assertJsonFragment(['summernote']);
    }
}
