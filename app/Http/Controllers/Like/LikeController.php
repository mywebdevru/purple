<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use App\Models\User;
use App\Models\Group;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
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
        if(!$request->likeable_type || !$request->likeable_id || !$request->authorable_type || !$request->authorable_id){
            abort(403, 'Недостаточно информации для создания like');
        }

        $var = DB::transaction(function () use ($request) {
            $like = $request->likeable_type::find($request->likeable_id)->likes()->create();
            $like = $request->authorable_type::find($request->authorable_id)->likes()->save($like);
            return $like;
        });
        $likes = $request->likeable_type::find($request->likeable_id)->load('likes.authorable');
        return response()->json(['like_id' => $var->id, 'likes' => $likes->likes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like, Request $request)
    {
        $result = $like->forceDelete();
        abort_if(!$result, 500);
        $likes = $request->likeable_type::find($request->likeable_id)->load('likes.authorable');
        return response()->json(['delete' => true, 'likes' => $likes->likes]);
    }
}
