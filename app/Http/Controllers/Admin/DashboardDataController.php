<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardDataController extends Controller
{
    public function usersCount()
    {
        $roles = Role::all()->toArray();
        $roles_data = [];
        foreach ($roles as $role) {
            $role_name = $role['name'];
            $roles_data[$role_name] = User::role($role_name)->count();
        }
        return response()->json([
            'type' => 'Users Count',
            'data' => [
                'count' => User::count(),
                'user_roles' => $roles_data,
            ],
        ]);
    }

    public function membersCount()
    {
        $member_types = [
            'users' => User::count(),
            'clubs' => Club::count(),
            'groups' => Group::count(),
        ];
        return response()->json([
            'type' => 'Members Count',
            'data' => [
                'count' => array_sum($member_types),
                '$member_types' => $member_types,
            ],
        ]);
    }
}
