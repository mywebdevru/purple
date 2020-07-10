<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Friends;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Friends::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, App\User::all()->count()),
        'friend_id' => rand(1, App\User::all()->count()),
    ];
});
