<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Storage;

class ProfileController extends Controller
{
    public function upload(Request $request)
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
            'status' => $result
        ]);
    }
}
