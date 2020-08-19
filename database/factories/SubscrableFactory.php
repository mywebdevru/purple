<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Subscrable;
use App\Models\User;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Subscrable::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, User::all()->count()),
        'subscrable_id' => rand(1, 20),
        'subscrable_type' => Arr::random(['App\Models\Club', 'App\Models\Group', 'App\Models\User'])
    ];
});
