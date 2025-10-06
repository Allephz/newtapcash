<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // connect ke database (default sudah connect via Laravel)
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
