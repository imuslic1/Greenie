<?php

namespace App\Repositories;

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
        $user->balance += $amount;
        $user->save();

        return $user;
    }

    public function getTopTenUsers() {
        return User::select('users.id', 'users.name', 'users.email', 'users.slug')
            ->selectRaw('SUM(CASE WHEN amount > 0 THEN amount ELSE 0 END) as total_amount')
            ->leftJoin('transactions', 'users.id', '=', 'transactions.user_id')
            ->groupBy('users.id', 'users.name', 'users.email', 'users.slug')
            ->where('users.is_company', false)
            ->orderBy('total_amount', 'desc')
            ->take(10)
            ->get();
    }

    public function getTopTenCompanies() {
        return User::select('users.id', 'users.name', 'users.email', 'users.slug')
            ->selectRaw('SUM(CASE WHEN amount > 0 THEN amount ELSE 0 END) as total_amount')
            ->leftJoin('transactions', 'users.id', '=', 'transactions.user_id')
            ->groupBy('users.id', 'users.name', 'users.email', 'users.slug')
            ->where('users.is_company', true)
            ->orderBy('total_amount', 'desc')
            ->take(10)
            ->get();
    }

    public function addUser($name, $email, $password) {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }
}
