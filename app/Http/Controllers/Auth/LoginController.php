<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // $this->middleware(['guest']);
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->intended('home');
        }
        return back()->with('status', 'Invalid login details');
    }
}
