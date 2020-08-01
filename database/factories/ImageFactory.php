<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $time = $faker->dateTimeBetween($startDate = '-3 weeks', $endDate = 'now', $timezone = 'Europe/Moscow');
    return [
        'image' => $faker->imageUrl($width = 800, $height = 600),
        'imageable_id' => rand(1, 20),
        'imageable_type' => Arr::random(['App\User', 'App\Club', 'App\Group']),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
