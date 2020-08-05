<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUploadRequest;
use App\User;
use Storage;

class ProfileController extends Controller
{
    public function upload(ProfileUploadRequest $request)
    {
        $type = $request['type'];
        $user = User::findOrFail($request['user']);
        $file = $request['file'];
        Storage::delete($user->$type);
        $image = $file->store($type . 's');
        $user->$type = $image;
        $result = $user->save();
        return response()->json([
            'image' => $image,
            'type' => $type,
            'status' => $result,
        ])->status();
    }
}
