<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'username');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
