<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::unsetEventDispatcher();
        User::factory()->count(50)->create()->each(function (User $user, $index) {
            $num = $index + 1;
            $user->avatar = "/admin/users/avatars/avatar-$num.jpg";
            $user->save();
        });
    }
}
