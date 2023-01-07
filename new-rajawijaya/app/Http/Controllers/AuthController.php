<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index()
  {
    $data = [
      'title' => 'Login'
    ];

    return view('login.index', $data);
  }

  public function authenticate(Request $request)
  {
    $validatedData = $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    if (Auth::attempt($validatedData)) {
      $request->session()->regenerate();
      return redirect()->intended('/dashboard');
    }

    return back()->with('loginError', 'Login Failed');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
