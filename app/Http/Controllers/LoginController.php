<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginPage () {
        return view('login');
    }

    /**
     * Function for login.
     * Take credentials & then generate session with Laravel
     */
    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'user not found']);
        }

        $request->session()->regenerate();
        
        return redirect()->intended('dashboard');
    }
}
