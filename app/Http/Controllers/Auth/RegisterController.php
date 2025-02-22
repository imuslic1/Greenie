<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        // $this->middleware(['guest']);
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('auth.register');
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
