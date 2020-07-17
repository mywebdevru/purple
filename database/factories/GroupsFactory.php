<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText(rand(20, 140)),
    ];
});
