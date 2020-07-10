<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Friends;
use App\Http\Controllers\User\FriendsController ;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $data = $users->find($user);
        // if (!$user){
        //     return redirect()->route('home');
        // }
        // $fr = $user->load('friends.user');
        // foreach ($fr as $f) {
        //     dump($f);
        // }
        // dd($fr->friends1->user2);
        $vehicles = $user->usersVehicles()->select('type', 'brand', 'model', 'vehicle_bd', 'description')->get();
        $friends_id = $user->friends()->pluck('friend_id');
        $friends = User::whereIn('id', $friends_id)->select('name', 'surname', 'avatar')->get();
        return view('user.user',['data' => $user, 'vehicles' => $vehicles, 'friends' => $friends]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->except('_token');
        $save = $user->fill($data)->save();
        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        //
    }
}
