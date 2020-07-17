<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Postables;
use App\Posts;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Postables::class, function (Faker $faker) {
    return [
        'posts_id' => $faker->unique()->numberBetween(1, Posts::all()->count()),
        'postable_id' => rand(1, 10),
        'postable_type' => Arr::random(['App\User', 'App\Club', 'App\Groups'])
    ];
});
