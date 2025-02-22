<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ConnectionRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $transactionRepository;
    private $connectionRepository;
    private $userRepository;

    public function __construct(TransactionRepository $transactionRepository, 
                                ConnectionRepository $connectionRepository,
                                UserRepository $userRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->connectionRepository = $connectionRepository;
        $this->userRepository = $userRepository;
    }

    public function index(User $user)
    {
        $balance = $user->balance;
        $transactions = $user->transactions;

        $connections = $this->connectionRepository->getConnectionsByUserId($user->id);
        foreach ($connections as $key=>$connection) {
            $connections[$key] = $this->userRepository->getUserById($connection->user_id);
        }

        $todaysAmount = $this->transactionRepository->getTodaysAmountByUserId($user->id);

        $sevenDaysAgo = Carbon::now()->subDays(7)->startOfDay();
        $twoWeeksAgo = Carbon::now()->subDays(14)->startOfDay();
        $today = Carbon::now()->endOfDay();

        $thisWeek = $this->transactionRepository->getTimedAmountByUserId($user->id, $sevenDaysAgo, $today);
        $lastWeek = $this->transactionRepository->getTimedAmountByUserId($user->id, $twoWeeksAgo, $sevenDaysAgo);
        $lastWeek = $lastWeek === 0 ? 1 : $lastWeek;
        $trend = 100 * $thisWeek / $lastWeek;

        return view('users.index', compact('user', 'balance', 'transactions', 'connections', 'todaysAmount', 'trend'));
    }
}
