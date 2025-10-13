<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SimpleAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect('/main-dashboard');
        }
        return back()->withErrors(['login' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
