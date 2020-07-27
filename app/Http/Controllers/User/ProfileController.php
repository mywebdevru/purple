<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Friend;
use App\Club;
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
        $clubsPosts= collect([]);
        $groupsPosts= collect([]);
        $usersPosts= collect([]);
        $userPosts = $user->posts; //Собственные посты
        $user->loadCount('posts', 'subscribesToClubs', 'subscribesToUsers', 'subscribesToGroups'); //Счетчики постов и подписок
        if (!!auth()->user() && auth()->user()->id == $user->id) {
            $user->load('subscribesToClubs.posts', 'subscribesToUsers.posts', 'usersVehicles', 'friends.user', 'friendshipRequests.friend', 'requestedFriendships.user');
            foreach ($user->subscribesToClubs as $subscribe){
                foreach($subscribe->posts->where('updated_at', '>', '2020-07-11') as $post){ //Условие выбора по дате сделано для примера
                    $post['author'] = 'Клуб '. $subscribe->name;
                    // $post['author_route'] = "club.show, ['club' => $post->postable_id]";
                    $clubsPosts->push($post);
                }
            }
            foreach ($user->subscribesToGroups as $subscribe){
                foreach($subscribe->posts->where('updated_at', '>', '2020-07-11') as $post){
                    $post['author'] = 'Группа '. $subscribe->name;
                    // $post['author_route'] = "group.show, ['group' => $post->postable_id]";
                    $groupsPosts->push($post);
                }
            }
            foreach ($user->subscribesToUsers as $subscribe){
                foreach($subscribe->posts->where('updated_at', '>', '2020-07-11') as $post){
                    $post['author'] = $subscribe->full_name;
                    $post['author_route'] = "user.show, ['user' => $post->postable_id]";
                    $usersPosts->push($post);
                }
            }
            $posts = $clubsPosts->merge($groupsPosts)->merge($userPosts)->sortByDesc('updated_at');
        } else {
            $posts = $userPosts;
            $user->load('subscribesToClubs', 'subscribesToUsers', 'usersVehicles', 'friends.user', 'friendshipRequests.friend', 'requestedFriendships.user');
        }

        // dd($user->toArray());
        return view('user.prof',['data' => $user, 'posts' => $posts]);
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
        if ($user->cannot('update', auth()->user())){
            abort(403, 'Вы не можете редактировать данные '.$user->full_name);
        }
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
