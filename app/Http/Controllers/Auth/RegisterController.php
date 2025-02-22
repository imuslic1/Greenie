<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $userRepository;
    private $companyRepository;

    public function __construct(UserRepository $userRepository,
                                CompanyRepository $companyRepository,) {
        // $this->middleware(['guest']);
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
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
            ]);
        
        $this->userRepository->addUser($request->name, $request->email, $request->password);
        
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
