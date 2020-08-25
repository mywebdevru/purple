<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\SaveProfileRequest;
use App\Http\Requests\ProfileUploadRequest;
use App\Http\Resources\Profile\ProfileDataResource;
use App\Models\User;
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
        ]);
    }

    public function data(User $user)
    {
        return new ProfileDataResource($user);
    }

    public function save(User $user, SaveProfileRequest $request) {
        $data = $request->all();
        $result = $user->update($data);
        if($result) {
            return response('Профиль пользователя успешно сохранен', 201);
        }
        return response('Ошибка сервера. Пожалуйста, попробуйте сохранить профиль позже', 500);
    }
}
