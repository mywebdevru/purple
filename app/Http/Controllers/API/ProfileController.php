<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $type = $request['type'];
        $user = User::findOrFail($request['user']);
        $file = $request['file'];
        $image = $file->store('wallpapers');
        $user->$type = $image;
        $result = $user->save();
        return $result;
    }
}
