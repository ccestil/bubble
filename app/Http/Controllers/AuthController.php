<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/customer'); // Redirect to a dashboard or intended page
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
    public function showAdminLoginForm()
    {
        return view('admin.auth.login'); // Create this view
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the admin user
        if (Auth::attempt($credentials)) { // You might need to customize the guard here
            $request->session()->regenerate();

            return redirect()->intended('/home'); // Redirect admin to their dashboard
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
}
