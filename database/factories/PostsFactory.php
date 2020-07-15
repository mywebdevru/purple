<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(rand(120, 340)),
    ];
});
