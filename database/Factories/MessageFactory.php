<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

use Faker\Generator as Faker;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['body' => "string", 'recipient_id' => Factory::class])]
    public function definition(): array
    {
        return [
            'body' => $this->faker->sentence,
            'recipient_id' => User::factory(),
        ];
    }
}
