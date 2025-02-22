<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeaderboardsController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $topTenUsers = $this->userRepository->getTopTenUsers();
        $topTenCompanies = $this->userRepository->getTopTenCompanies();
        
        return view('leaderboards', compact('topTenUsers', 'topTenCompanies'));
    }
}
