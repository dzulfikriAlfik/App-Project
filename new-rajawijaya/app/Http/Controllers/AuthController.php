<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index()
  {
    $data = [
      'title'   => 'Login',
      "company" => CompanyProfile::all()->first(),
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
      $request->session()->put('login', true);
      $request->session()->put('role', auth()->user()->role);

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
