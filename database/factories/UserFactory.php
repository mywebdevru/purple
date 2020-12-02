<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$rf7MHVdVCW4lLau/gDCQBOyLayW9nlQlk6nnVssx63LUcvgv1QgEe', // password 123
        'remember_token' => Str::random(10),
        'city' => $faker->city,
        'country' => $faker->country,
        'gender' =>  Arr::random(['Мужчина', 'Женщина']),
        'birth_date' =>$faker->date(),
        'avatar' => 'https://thispersondoesnotexist.com/image',
        'wallpaper' => 'https://picsum.photos/seed/'.rand(1, 1000).'/1200/400',
    ];
});
