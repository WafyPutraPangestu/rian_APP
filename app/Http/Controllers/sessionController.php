<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class sessionController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }
    public function registerView()
    {
        return view('auth.register');
    }

    public function storeLogin(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::attempt() === 'user') {
                return redirect()->intended('/')->with('success', 'Login successful');
            }
        }
        return redirect()->back()
            ->withInput(request()->only('email', 'password'))
            ->with(['PASSWORD' => 'Invalid  password',])
            ->withErrors(['email' => 'email tidak terdaftar']);
    }

    public function storeRegister(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_telp' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create($credentials);
        $request->session()->regenerate();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('auth.login')->with('success', 'Registration successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successful');
    }
}
