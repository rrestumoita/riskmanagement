<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // Menampilkan halaman login
    public function create()
    {
        return view('session.login-session');
    }

    // Menangani proses login
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('rememberMe'))) {
            $request->session()->regenerate();

            // Cek peran berdasarkan email
            $user = Auth::user();
            if ($user->email == 'admin@gmail.com') {
                return redirect('dashboard');
            } elseif ($user->email == 'analis@gmail.com') {
                return redirect('dashboard');
            } elseif ($user->email == 'managerti@gmail.com') {
                return redirect('dashboard');
            }

            // Jika tidak sesuai dengan email yang ditentukan, arahkan ke dashboard default
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Menangani logout
    public function destroy()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You\'ve been logged out.');
    }
}
