<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Group;
use App\Models\Model;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText(rand(20, 140)),
        'avatar' => $faker->imageUrl($width = 400, $height = 400, 'people'),
    ];
});
