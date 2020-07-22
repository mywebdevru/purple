<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Subscrable;
use App\User;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Subscrable::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, User::all()->count()),
        'subscrable_id' => rand(1, 20),
        'subscrable_type' => Arr::random(['App\Club', 'App\Group'])
    ];
});
