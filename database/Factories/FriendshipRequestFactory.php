<?php

namespace Database\Factories;

use App\Models\FriendshipRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class FriendshipRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FriendshipRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    #[ArrayShape(['user_id' => "int", 'friend_id' => "int"])]
    public function definition(): array
    {
        $count = User::count();
        return [
            'user_id' => $this->faker->numberBetween(1, $count),
            'friend_id' => $this->faker->numberBetween(1, $count),
        ];
    }
}
