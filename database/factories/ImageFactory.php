<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;
use App\Models\User;
use App\Models\Club;
use App\Models\Group;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */

    #[ArrayShape(['image' => "string", 'imageable_id' => "int", 'imageable_type' => "array|mixed", 'created_at' => "\DateTime", 'updated_at' => "\DateTime", 'position' => "false|string"])]
    public function definition(): array
    {
        $time = $this->faker->dateTimeBetween($startDate = '-3 weeks', $endDate = 'now', $timezone = 'Europe/Moscow');
        return [
            'image' => 'https://picsum.photos/seed/' . random_int(1, 1000) . '/1024/800',
            'imageable_id' => random_int(1, 20),
            'imageable_type' => Arr::random([User::class, Club::class, Group::class]),
            'created_at' => $time,
            'updated_at' => $time,
            'position' => json_encode([
                "verbose" => "Москва",
                "longitude" => "55.80198552387842",
                "latitude" => "37.57167877197265"
            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE)
        ];
    }
}
