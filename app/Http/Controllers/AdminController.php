<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Partner;
use App\Models\RefferalCode;
use App\Repositories\OfferRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\ReferralCodeRepository;
use App\Services\SecretKeyService;
use App\Services\SlugService;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    private $offerRepository;
    private $partnerRepository;
    private $referralCodeRepository;
    private $slugService;
    private $secretKeyService;

    public function __construct(OfferRepository $offerRepository, PartnerRepository $partnerRepository, ReferralCodeRepository $referralCodeRepository, SlugService $slugService, SecretKeyService $secretKeyService)
    {
        $this->offerRepository = $offerRepository;
        $this->partnerRepository = $partnerRepository;
        $this->referralCodeRepository = $referralCodeRepository;
        $this->slugService = $slugService;
        $this->secretKeyService = $secretKeyService;
    }

    public function index()
    {

        $offers = $this->offerRepository->getAllOffers();
        $partners = $this->partnerRepository->getAllPartners();
        $referralCodes = $this->referralCodeRepository->getAllReferralCodes();


        return view('admin_dashboard', ['offers' => $offers, 'partners' => $partners, 'referralCodes' => $referralCodes]);
    }

    public function toggleOfferStatus($offer_id)
    {
        $offer = Offer::find($offer_id);

        if ($offer) {
            $offer->active = !$offer->active;
            $offer->save();
        }

        return redirect()->back();
    }

    public function toggleReferralCodeStatus($referralCode_id)
    {
        $referralCode = RefferalCode::find($referralCode_id);

        if ($referralCode) {
            $referralCode->active = !$referralCode->active;
            $referralCode->save();
        }

        return redirect()->back();
    }

    public function addOffer(Request $request)
    {
        $validatedData = $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'amount' => 'required|integer',
            'discount_percentage' => 'required|numeric',
        ]);

        Log::info('Validated Data:' . $validatedData);

        $offer = $this->offerRepository->addOffer($validatedData);

        return redirect()->route('admin.index')->with('success', 'Offer added successfully');
    }

    public function addPartner(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'domain' => 'nullable',
        ]);

        $slug = $this->slugService->getOriginalSlug($request->name, $this->partnerRepository);
        $secretKey = $this->secretKeyService->generateSecretKey();

        $partner = $this->partnerRepository->addPartner($validatedData, $slug, $secretKey);

        return redirect()->route('admin.index')->with('success', 'Partner added successfully');
    }
}
