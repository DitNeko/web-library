<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('index.dashboard');
        }
        return view('login');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('index.dashboard');
        }
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('member');

        auth()->login($user);

        return redirect()->route('home')->with('success', 'You have successfully logged in');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $cradentials = $request->only('email', 'password');

        if (Auth::attempt($cradentials)) {
            if(Auth::user()->hasRole('admin')) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success', 'You have successfully logged in');
            }else if(Auth::user()->hasRole('member')) {
                $request->session()->regenerate();
                return redirect()->intended('/home')->with('success', 'You have successfully logged in');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password anda salah bre'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if ($request->isMethod('POST')) {
            Auth::logout();
            $request->session()->invalidate();
            return redirect()->route('show-login')->with('success', 'you have successfully logged out');
        }
        return redirect()->route('show-login')->with('error', 'invalid logout request');
    }
}
