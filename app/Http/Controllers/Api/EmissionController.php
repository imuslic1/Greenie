<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EmissionController extends Controller
{
    private $partnerRepository;
    private $userRepository;
    private $transactionRepository;

    public function __construct(PartnerRepository $partnerRepository,
                                UserRepository $userRepository,
                                TransactionRepository $transactionRepository)
    {
        $this->partnerRepository = $partnerRepository; 
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function updateUserEmission(Request $request)
    {
        $incomingKey = $request->header('secret-key');

        if (!$incomingKey || !($partner = $this->partnerRepository->getPartnerBySecretKey($incomingKey))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $email = $request->get('email');
        $emission = $request->get('emission');
        $user = $this->userRepository->getUserByEmail($email);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $this->transactionRepository->addTransaction($user->id, $partner->id, $emission);
        return response()->json(['message' => 'Emission updated successfully']);
    }
}
