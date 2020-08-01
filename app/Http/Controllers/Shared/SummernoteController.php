<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Summernote\SummernoteDeleteRequest;
use App\Http\Requests\Summernote\SummernoteUploadRequest;
use App\Image;
use App\User;
use Storage;

class SummernoteController extends Controller
{
    public function upload(SummernoteUploadRequest $request)
    {
        $images = [];
        foreach ($request['files'] as $image) {
            $img = $image->store('summernote');
            $user = User::find(auth()->user()->id);
            $user->images()->create(['image' => $img]);
            $images[] = $img;
            $pic = \Image::make('storage/' . $img);
            $width = $pic->width();
            if($width > 800) {
                $pic->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $pic->save();
        }
        return $images;
    }

    public function delete(SummernoteDeleteRequest $request)
    {
        Image::where('image', $request['file'])->delete();
        return Storage::delete($request['file']);
    }
}
