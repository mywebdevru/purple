<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;


$factory->define(Friend::class, function (Faker $faker) {
    return
    [
            'user_id' => rand(1, App\Models\User::all()->count()),
            'friend_id' => rand(1, App\Models\User::all()->count()),
    ];
});
