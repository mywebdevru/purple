<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserVehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Arr;

class UserVehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserVehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */

    public function definition()
    {
        return [
            'type' => Arr::random(['Автомобиль', 'Квадроцикл']),
            'brand' => Arr::random(['Toyota', 'Cadillac', 'KIA', 'Renault', 'УАЗ', 'Mercedes Benz']),
            'model' => Arr::random(['Duster', 'Patriot', '4 Runner', 'Gelandewagen', 'Escalade']),
            'vehicle_bd'=> $this->faker->year,
            'user_id' => random_int(1, User::count()),
            'description' => $this->faker->realText(random_int(20, 150)),
            'avatar' => 'https://www.fillmurray.com/400/400',
        ];
    }
}
