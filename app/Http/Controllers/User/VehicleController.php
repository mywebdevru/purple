<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UserVehicle;
use App\User;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserVehicle  $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(UserVehicle $userVehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserVehicle  $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVehicle $userVehicles, User $user)
    {
        return view('user.components.edit_profile.vehicles');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserVehicle  $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVehicle $userVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserVehicle  $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVehicle $userVehicle)
    {
        //
    }
}
