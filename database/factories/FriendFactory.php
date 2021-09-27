<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Arr;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

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
        return
            [
                'user_id' => random_int(1, $count),
                'friend_id' => random_int(1, $count),
            ];
    }
}
