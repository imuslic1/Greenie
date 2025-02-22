<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Models\User;

class UserRepository
{
    public function getUserById($userId) {
        return User::find($userId);
    }
}
