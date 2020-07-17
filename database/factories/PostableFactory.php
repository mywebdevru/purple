<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Postable;
use App\Post;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Postable::class, function (Faker $faker) {
    return [
        'posts_id' => $faker->unique()->numberBetween(1, Post::all()->count()),
        'postable_id' => rand(1, 10),
        'postable_type' => Arr::random(['App\User', 'App\Club', 'App\Group'])
    ];
});
