<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        $data = ["title" => "Login Page"];
        return view('/auth/login', $data);
    }

    public function Register(): View
    {
        $data = ["title" => "Register Page"];
        return view('/auth/register', $data);
    }

    public function signUp(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:15',
            'username' => 'required|unique:users|max:15',
            'email' => 'required|unique:users|max:15',
            'password' => 'min:5|max:20',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect('/login')->with('notification', ['Berhasil', 'berhasil abangku', 'success']);
    }

    public function signIn(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $admin = auth()->user()->is_admin;
            if ($admin) {
                return redirect('/dashboard')->with('notification', ['Berhasil', 'Your Log In is success', 'info']);
            } else {
                return redirect('/blog')->with('notification', ['Berhasil', 'Your Log In is success', 'info']);
            }
        } else {
            return redirect('/login')->with('notification', ['Gagal', 'The provided credentials do not match our records', 'error']);
        }
    }

    public function logOut(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
