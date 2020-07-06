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
    public function show(User $users, $user)
    {
        $data = $users->find($user);
        if (!$data){
            return redirect()->route('home');
        }
        $vehicles = $data->usersVehicles;
        $friends1 = $data->friends1()->whereNull('pending')->pluck('user2_id');
        $friends2 = $data->friends2()->whereNull('pending')->pluck('user1_id');
        $merged = $friends1->merge($friends2);
        $friends = $users->whereIn('id', $merged)->select('name', 'surname')->get();
        return view('user.user',['data' => $data, 'vehicles' => $vehicles, 'friends' => $friends]);
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
    public function update(Request $request, User $users)
    {
        //
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
