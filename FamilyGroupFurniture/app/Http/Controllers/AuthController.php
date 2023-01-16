<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:5|max:16'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            $request->session()->put('login', true);
            $request->session()->put('role', auth()->user()->role);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];

        return view('auth.register', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'     => 'required|max:50',
            'email'    => 'required|email|unique:users,email',
            'alamat'   => 'required',
            'telepon'  => 'required|numeric|unique:users,telepon',
            'password' => 'required|min:6|max:16'
        ]);

        $validatedData['password']     = Hash::make($validatedData['password']);
        $validatedData['role']         = "mitra";

        User::create($validatedData);

        return redirect('/login')->with('success', 'Akun anda berhasil didaftarkan');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
