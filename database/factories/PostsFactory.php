<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(rand(120, 340)),
        'postable_id' => rand(1, 20),
        'postable_type' => Arr::random(['App\User', 'App\Club', 'App\Group']),
    ];
});
