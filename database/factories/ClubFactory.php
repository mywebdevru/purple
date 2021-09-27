<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ClubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Club::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    #[ArrayShape(['name' => "string", 'city' => "string", 'country' => "string", 'birth_date' => "string", 'description' => "string", 'avatar' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'birth_date' => $this->faker->date(),
            'description' => $this->faker->realText(random_int(20, 140)),
            'avatar' => 'https://placebeard.it/200x200',
        ];
    }
}
