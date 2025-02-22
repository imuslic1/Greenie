<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use App\Repositories\ReferralCodeRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    private $partnerRepository;
    private $userRepository;
    private $referralCodeRepository;
    private $transactionRepository;

    public function __construct(PartnerRepository $partnerRepository,
                                UserRepository $userRepository,
                                ReferralCodeRepository $referralCodeRepository,
                                TransactionRepository $transactionRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->userRepository = $userRepository;
        $this->referralCodeRepository = $referralCodeRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function updateReferralCode(Request $request)
    {
        $incomingKey = $request->header('secret-key');

        if (!$incomingKey || !($partner = $this->partnerRepository->getPartnerBySecretKey($incomingKey))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $email = $request->get('email');
        $referralCode = $request->get('referral_code');
        $user = $this->userRepository->getUserByEmail($email);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $referralCode = $this->referralCodeRepository->updateReferralCode($referralCode, $partner->id);
        if (!$referralCode || $referralCode->offer->partner_id !== $partner->id) {
            return response()->json(['error' => 'Referral code not available'], 404);
        }
        
        $offer = $referralCode->offer;
        $user = $this->userRepository->updateUserAmount($user, -$offer->amount);

        return response()->json(['message' => 'Referral code used successfully']);
    }
}
