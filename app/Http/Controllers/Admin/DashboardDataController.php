<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardDataController extends Controller
{
    public function usersCount()
    {
        return response()->json([
            'total' => User::count(),
            'admin' => User::role('admin')->count(),
            'super_admin' => User::role('super-admin')->count(),
        ]);
    }
}
