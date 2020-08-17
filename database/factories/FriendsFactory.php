<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;


$factory->define(Friend::class, function (Faker $faker) {
    $user_id = rand(1, App\Models\User::all()->count());
    $friend_id = rand(1, App\Models\User::all()->count());
    Friend::create([
        'user_id' => $user_id,
        'friend_id' => $friend_id,
    ]);
    Friend::create([
        'user_id' => $friend_id,
        'friend_id' => $user_id,
    ]);
    User::find($user_id)->subscribesToUsers()->attach($friend_id);
    User::find($friend_id)->subscribesToUsers()->attach($user_id);
    return
    [
            'user_id' => App\Models\User::all()->count(),
            'friend_id' => App\Models\User::all()->count(),
    ];
});
