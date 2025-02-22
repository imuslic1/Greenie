<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Models\User;

class UserRepository
{
    public function getUserById($userId) {
        return User::find($userId);
    }

    public function getUserByEmail($email) {
        return User::where('email', $email)->first();
    }

    public function updateUserAmount($user, $amount) {
        $user->amount += $amount;
        $user->save();

        return $user;
    }
}
