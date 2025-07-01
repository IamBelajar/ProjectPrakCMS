<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin() {
        return view('auth.login');
    }

    // Tampilkan form register
    public function showRegister() {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Akun::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Proses login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('pendaftar.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
