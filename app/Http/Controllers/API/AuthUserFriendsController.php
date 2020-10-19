<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResourceCollection;
use Illuminate\Http\Request;

class AuthUserFriendsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return UserResourceCollection
     */
    public function __invoke()
    {
        return new UserResourceCollection(auth()->user()->getFriendsUsers());
    }
}
