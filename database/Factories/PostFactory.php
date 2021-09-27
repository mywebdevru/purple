<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;
use App\Models\User;
use App\Models\Club;
use App\Models\Group;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */

    public function definition()
    {
        $time = $this->faker->dateTimeBetween($startDate = '-3 weeks', $endDate = 'now', $timezone = 'Europe/Moscow');
        return [
            'text' => $this->faker->realText(random_int(120, 340)),
            'postable_id' => random_int(1, 20),
            'postable_type' => Arr::random([User::class, Club::class, Group::class]),
            'created_at' => $time,
            'updated_at' => $time,
        ];
    }
}
