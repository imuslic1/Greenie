<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function index()
    {
        
        $partners = $this->partnerRepository->getAllPartners();

        foreach ($partners as $partner) {
            $hasActive = false;
            foreach ($partner->offers as $offer) {
                if ($offer->active) {
                    $hasActive = true;
                    break;
                }

            }
            $partner->openOffers = $hasActive;
            $randomNumber = mt_rand(1, 7);
            $partner->logo = 'images/partner_logo/' . $randomNumber . '.png';
        }
        return view('home', compact('partners', 'randomNumber'));
    }

    public function contact()
    {
        return view('contact-us');
    }
}
