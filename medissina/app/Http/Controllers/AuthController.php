<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companytype;
use Session;

use Alert;

class AuthController extends Controller
{
  //
  public function Login()
  {
    if (Session::has('login')) {
      return redirect(url('/cms'));
    } else {
      return view('Login', ["title" => 'Login']);
    }
  }

  public function Register()
  {
    if (Session::has('login')) {
      return redirect(url('/cms'));
    } else {
      $data = [
        "title"        => "Register",
        "company_type" => Companytype::all()
      ];
      return view('register', $data);
    }
  }

  public function login_process(Request $request, $role)
  {
    $request->session()->put('login', true);
    $request->session()->put('role', $role);
    return redirect(url('/login'));
  }

  public function register_process(Request $request, $role)
  {
    $request->session()->put('login', true);
    $request->session()->put('role', $role);
    return redirect(url('/login'));
  }

  public function logout()
  {
    session()->forget('login');
    session()->forget('role');
    return redirect(url('/login'));
  }
}
