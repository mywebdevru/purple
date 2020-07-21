<?php

namespace App\Http\Controllers\User;

use App\FriendshipRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendshipRequestController extends Controller
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
     * @return back()
     */
    public function store(Request $request, FriendshipRequest $friendshipRequests)
    {
        abort_if(!$request->user_id || !$request->friend_id, 403, 'Странный запрос');
        $result = $friendshipRequests->create(['user_id' => $request->user_id,'friend_id' => $request->friend_id]);
        abort_if(!$result, 500);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FriendshipRequest $friendshipRequest)
    {
        $result = $friendshipRequest->delete();
        abort_if(!$result, 404);
        return back();
    }
}
