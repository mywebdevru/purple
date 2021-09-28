<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$rf7MHVdVCW4lLau/gDCQBOyLayW9nlQlk6nnVssx63LUcvgv1QgEe', // password 123
            'remember_token' => Str::random(10),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'gender' =>  Arr::random(['Мужчина', 'Женщина']),
            'birth_date' =>$this->faker->date(),
            'wallpaper' => 'https://picsum.photos/seed/' . random_int(1, 1000) . '/1200/400',
        ];
    }
}
