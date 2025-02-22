<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Partner;
use App\Repositories\ReferralCodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    private $referralCodeRepository;

    public function __construct(ReferralCodeRepository $referralCodeRepository)
    {
        $this->referralCodeRepository = $referralCodeRepository;
    }

    public function index(Partner $partner) {
        $user = auth()->user();
        $userCodes = $this->referralCodeRepository->getReferralCodesByPartnerAndUser($partner->id, $user->id);

        return view('offers', compact('partner', 'userCodes'));
    }

    public function store(Offer $offer, Request $request) {
        $user = $request->user();
        $partner = $offer->partner;

        $code = Str::upper(Str::random(10));

        while ($this->referralCodeRepository->checkIfCodeExists($code)) {
            $code = Str::upper(Str::random(10));
        }
        $referralCode = $this->referralCodeRepository->addReferralCode($user->id, $partner->id, $offer->id, $code);

        return redirect()->route('offers', $offer);
    }
}
