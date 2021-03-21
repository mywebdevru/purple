<?php

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unsetEventDispatcher();

        $admins = [];

        $user = User::where('email', 'ruslan@skazkin.su')->first();

        if(!$user) {
            $ruslan = User::create([
                'name' => 'Rus',
                'surname' => 'Skazkin',
                'email' => 'ruslan@skazkin.su',
                'password' => '$2y$10$Hv7RJYtTrhrSTcgFVKcz0.aUfVWkQIBB13BpTbHTrknSkwgpQzvim',
                'avatar' => '/admin/users/super-admin.png',
                'wallpaper' => '/admin/users/super-admin-wp.jpg',
                'creed' => 'De omnibus dubito',
                'gender' => 'Мужчина',
                'birth_date' => '1975-05-29',
                'city' => 'Краснодар',
                'country' => 'Россия',
            ]);

            $ruslan->assignRole('super-admin');
            array_push($admins, $ruslan);
        }

        $user = User::where('email', 'x3mart@purple.team')->first();

        if(!$user) {
            $slava = User::create([
                'name' => 'Вячеслав',
                'surname' => 'Морозов',
                'email' => 'x3mart@purple.team',
                'password' => Hash::make('123'),
                'creed' => 'Too old to die young',
                'avatar' => '/admin/users/slava-avatar.jpeg',
                'wallpaper' => 'https://picsum.photos/id/1049/1200/400',
            ]);

            $slava->assignRole('admin');
            array_push($admins, $slava);
        }

        $user = User::where('email', 'alex@purple.team')->first();

        if(!$user) {
            $alex = User::create([
                'name' => 'Алексей',
                'surname' => 'Майоров',
                'email' => 'alex@purple.team',
                'password' => Hash::make('123'),
                'creed' => 'Too old to die young',
                'avatar' => '',
                'wallpaper' => 'https://picsum.photos/id/1049/1200/400',
            ]);

            $alex->assignRole('admin');
            array_push($admins, $alex);
        }
        $user = User::where('email', 'evgeniy@purple.team')->first();

        if(!$user) {
            $evgen = User::create([
                'name' => 'Евгений',
                'surname' => 'Москвичев',
                'email' => 'evgeniy@purple.team',
                'password' => Hash::make('123'),
                'creed' => 'Too old to die young',
                'avatar' => '/img/ii.jpg',
                'wallpaper' => 'https://picsum.photos/id/1049/1200/400',
            ]);

            $evgen->assignRole('admin');
            array_push($admins, $evgen);
        }

        foreach ($admins as $user) {
            foreach ($admins as $otherUser) {
                if ($user !== $otherUser) {
                    Friend::makeFriends($user, $otherUser);
                }
            }
            array_shift($admins);
        }
    }
}
