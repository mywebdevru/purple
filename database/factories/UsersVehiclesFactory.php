<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserVehicle;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(UserVehicle::class, function (Faker $faker) {
    return [
        'type' => Arr::random(['Автомобиль', 'Квадроцикл']),
        'brand' => Arr::random(['Toyota', 'Cadilac', 'KIA', 'Renault', 'УАЗ', 'Mersedes Benz']),
        'model' => Arr::random(['Duster', 'Patriot', '4 Runner', 'GelentWagen', 'Escalade']),
        'vehicle_bd'=> $faker->year,
        'user_id' => rand(1, App\User::all()->count()),
        'description' => $faker->realText(rand(20, 150)),
        'avatar' => $faker->imageUrl($width = 400, $height = 400, 'transport'),
    ];
});
