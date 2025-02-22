<?php

namespace App\Repositories;

use App\Models\Connection;

class ConnectionRepository
{
    public function getConnectionsByUserId($userId) {
        $connections = Connection::where('user1_id', $userId)
            ->where('accepted', true)
            ->select('user2_id as user_id')
            ->union(
                Connection::where('user2_id', $userId)
                    ->where('accepted', true)
                    ->select('user1_id as user_id')
            )
            ->get();

        return $connections;
    }
}
