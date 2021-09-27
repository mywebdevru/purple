<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */

    #[ArrayShape(['name' => "string", 'description' => "string", 'avatar' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->realText(random_int(20, 140)),
            'avatar' => 'https://www.fillmurray.com/200/200',
        ];
    }
}
