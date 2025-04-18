<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    function login(): View
    {
        return view('auth.login');
    }

    function doLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('task.index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route('login');
    }


}
