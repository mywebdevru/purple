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
        $user = User::find($request['user']);
        $file = $request['file'];
        $image = $file->store('avatar');
        $user->$type = $image;
        $result = $user->save();
        return $result;
    }
}
