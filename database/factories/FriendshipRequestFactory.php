<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FriendshipRequest;
use App\User;
use Faker\Generator as Faker;

$factory->define(FriendshipRequest::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, User::all()->count()),
        'friend_id' => $faker->numberBetween(1, User::all()->count()),
    ];
});
