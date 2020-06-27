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
            User::create([
                'name' => 'Rus Skazkin',
                'email' => 'ruslan@purple.team',
                'password' => Hash::make('ruslan'),
            ]);
        }
    }
}
