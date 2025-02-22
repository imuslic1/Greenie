<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class TransactionRepository
{
    public function getTodaysAmountByUserId($userId) {
        $amount = Transaction::where('user_id', $userId)
            ->whereDate('created_at', today())
            ->sum('amount');
        
        return $amount;
    }

    public function getAllTransactionsByUserId($userId) {
        $transactions = Transaction::where('user_id', $userId)
            ->get();

        return $transactions;
    }

    public function getTimedAmountByUserId($userId, $from, $to) {
        $amount = Transaction::where('user_id', $userId)
            ->whereBetween('created_at', [$from, $to])
            ->sum('amount');
        Log::info("User: $userId Amount: $amount");
        return $amount;
    }

    public function addTransaction($userId, $partnerId, $amount) {
        $transaction = new Transaction();
        $transaction->user_id = $userId;
        $transaction->partner_id = $partnerId;
        $transaction->amount = $amount;
        $transaction->save();

        return $transaction;
    }
    
    public function getTopTenUsers() {
        return Transaction::select('user_id')
            ->selectRaw('SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->orderBy('total_amount', 'desc')
            ->take(10)
            ->get();
    }
}
