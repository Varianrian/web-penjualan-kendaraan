<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Login gagal, silahkan cek email dan password.');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if (preg_match("/[gmail|yahoo]\.com/", $credentials['email']) == 0) {
            return back()->withInput()->with('error', 'Email harus diakhiri dengan @gmail.com atau @yahoo.com');
        }

        $user = new User();
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'User berhasil dibuat, silahkan login.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
