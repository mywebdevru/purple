<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::paginate(12));
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
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('admin.posts.show')->with('post', $post)->with('postable', $post->postable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->only(['text']);

        $post->update($data);

        session()->flash('success', 'Пост обновлен');

        return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->forceDelete();

        session()->flash('success', 'Пост был удален');

        return redirect()->route('admin.post.index');
    }
}
