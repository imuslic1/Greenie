<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\SlugService;

class RegisterController extends Controller
{
    private $userRepository;
    private $companyRepository;
    private $slugService;

    public function __construct(UserRepository $userRepository,
                                CompanyRepository $companyRepository,
                                SlugService $slugService) {
        // $this->middleware(['guest']);
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
        $this->slugService = $slugService;
    }

    public function index()
    {
        $companies = $this->companyRepository->getAllCompanies();
        return view('auth.register', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $slug = $this->slugService->getOriginalSlug($request->name, $this->userRepository);
        
        $this->userRepository->addUser($request->name, $request->email, $request->password, $slug, $request->company_id);
        
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
