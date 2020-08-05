<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ruslan@purple.team')->first();

        if(!$user) {
            $ruslan = User::create([
                'name' => 'Rus',
                'surname' => 'Skazkin',
                'email' => 'ruslan@skazkin.su',
                'password' => Hash::make('ruslan'),
                'avatar' => 'https://lorempixel.com/200/200/people/',
                'wallpaper' => 'https://lorempixel.com/1200/400/transport/',
            ]);

            $ruslan->assignRole('super-admin');
        }

        $user = User::where('email', 'x3mart@purple.team')->first();

        if(!$user) {
            $slava = User::create([
                'name' => 'Вячеслав',
                'surname' => 'Морозов',
                'email' => 'x3mart@purple.team',
                'password' => Hash::make('123'),
                'creed' => 'Too old to die young',
                'avatar' => 'https://lorempixel.com/200/200/people/',
                'wallpaper' => 'https://lorempixel.com/1200/400/transport/',
            ]);

            $slava->assignRole('admin');
        }

        factory(User::class, 300)->create();
    }
}
