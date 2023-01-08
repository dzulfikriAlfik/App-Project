<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $data = [
      "user"    => auth()->user(),
      "company" => CompanyProfile::all()->first(),
    ];

    return view("dashboard.index", $data);
  }
}
