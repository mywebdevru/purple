<?php

namespace App\Http\Controllers\Admin;

use App\Models\FriendshipRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
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
     * @param  \App\Models\FriendshipRequest  $friendshipRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FriendshipRequest $friendshipRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FriendshipRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FriendshipRequest $request)
    {

        $result = $request->delete();
        abort_if(!$result, 404);
        return back()->with('success', 'Запрос на дружбу удален');
    }
}
