<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Club;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Club::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'city' => $faker->city,
        'country' => $faker->country,
        'birth_date' =>$faker->date(),
        'description' => $faker->realText(rand(20, 140)),
    ];
});
