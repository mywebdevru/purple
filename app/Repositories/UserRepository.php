<?php
namespace App\Repositories;
use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
class UserRepository implements UserRepositoryInterface
{
    public function getMaster()
    {
        return auth()->user()?auth()->user():[];
    }
}
