<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $time = $faker->dateTimeBetween($startDate = '-3 weeks', $endDate = 'now', $timezone = 'Europe/Moscow');
    return [
        'image' => 'https://picsum.photos/seed/'.rand(1, 1000).'/1024/800',
        'imageable_id' => rand(1, 20),
        'imageable_type' => Arr::random(['App\Models\User', 'App\Models\Club', 'App\Models\Group']),
        'created_at' => $time,
        'updated_at' => $time,
        'position' => [
            "verbose"=>"Москва",
            "longitude"=>"55.80198552387842",
            "latitude"=>"37.57167877197265"
        ]
    ];
});
