<?php

namespace Database\Factories;

use App\Models\Subscrable;
use App\Models\User;
use App\Models\Club;
use App\Models\Group;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class SubscrableFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscrable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    #[ArrayShape(['user_id' => "int", 'subscrable_id' => "int", 'subscrable_type' => "array|mixed"])]
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'subscrable_id' => random_int(1, 20),
            'subscrable_type' => Arr::random([Club::class, Group::class, User::class])
        ];
    }
}
