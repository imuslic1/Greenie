<?php

namespace App\Repositories;

use App\Models\Connection;

class ConnectionRepository
{
    public function getAcceptedConnectionsByUserId($userId) {
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

    public function getPendingConnectionsByUserId($userId) {
        $connections = Connection::where('user2_id', $userId)
            ->where('accepted', false)
            ->get();

        return $connections;
    }

    public function updateConnection($connection, $accepted) {
        if ($accepted !== true ) {
            $connection->delete();
            return;
        }
        
        $connection->accepted = $accepted;
        $connection->save();

        return $connection;
    }
}
