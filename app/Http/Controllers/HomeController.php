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

        return view('home', compact('partners'));
    }
}
