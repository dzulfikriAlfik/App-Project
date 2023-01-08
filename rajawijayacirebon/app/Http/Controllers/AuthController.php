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
      'username' => 'required|min:5|max:16',
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
      'alamat'   => 'required',
      'email'    => 'required|email|unique:users,email',
      'logo'     => 'required|image|file|max:1024|mimes:jpg,jpeg,png',
      'telp'     => 'required|numeric|unique:users,telp',
      'username' => 'required|unique:users,username|min:6|max:16',
      'password' => 'required|min:6|max:16'
    ]);

    $validatedData['password']     = Hash::make($validatedData['password']);
    $validatedData['role']         = "mitra";
    $validatedData['status_mitra'] = "pending";

    if ($logo = $request->file('logo')) {
      $fileName        = time() . "." . $logo->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/mitra');
      $logo->move($destinationPath, $fileName);

      $validatedData['logo_mitra']   = $fileName;
    }

    User::create($validatedData);

    return redirect('/login')->with('success', 'Akun anda berhasil ditambahkan, silahkan menunggu admin untuk menyetujui akun anda!');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
