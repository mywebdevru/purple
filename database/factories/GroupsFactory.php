<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Groups;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Groups::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText(rand(20, 140)),
    ];
});
