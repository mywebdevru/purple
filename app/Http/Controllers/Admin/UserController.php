<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResourceCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserResourceCollection
     */
    public function index()
    {
        return new UserResourceCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = request()->validate([
            'user_id' => 'required'
        ]);

        $user = User::findOrFail($data['user_id']);

        $userRoles = $user->getRoleNames();
        $authRoles = auth()->user()->getRoleNames();

        abort_if($userRoles->contains('super-admin'), 403, 'Нельзя удалить супер-админа');
        abort_if($userRoles->contains('admin') && !$authRoles->contains('super-admin'), 403, 'Вы не можете удалять админов');

        $user->forceDelete();
        return response()->json([], 204);
    }
}
