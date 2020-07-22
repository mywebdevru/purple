<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Summernote\SummernoteDeleteRequest;
use App\Http\Requests\Summernote\SummernoteUploadRequest;

class SummernoteController extends Controller
{
    public function upload(SummernoteUploadRequest $request)
    {
        $images = [];
        foreach ($request['files'] as $image) {
            $images[] = $image->store('summernote');
        }
        return $images;
    }

    public function delete(SummernoteDeleteRequest $request)
    {
        return $request;
    }
}
