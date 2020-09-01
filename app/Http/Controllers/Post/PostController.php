<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DB;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
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
        $vars = DB::transaction(function () use ($request) {
            $author = $request['model']::find($request['id']);
            $post = $author->post()->create('text');
            $feed = $post->feed()->create();
            $feed->authorable()->update($author);
            return compact('author', 'post', 'feed');
        });
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update(['text' => $request->text]);
        return response()->json(['text' => $post->text]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::transaction(function () use ($post) {
            foreach ($post->comments as $comment){
                $comment->likes()->forceDelete();
            }
            $images = $post->images()->pluck('image')->toArray();
            Storage::delete($images);
            $post->images()->forceDelete();
            $post->comments()->forceDelete();
            $post->likes()->forceDelete();
            $post->feed()->forceDelete();
            $post->delete();
        });
        return response()->json(['deleted' => true]);
    }
}
