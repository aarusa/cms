<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('cms.auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        // Validate the login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to dashboard
            return redirect()->intended('/')->with('success', 'You are logged in!');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out!');
    }
}