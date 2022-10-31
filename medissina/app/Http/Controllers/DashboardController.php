<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  //
  public function Dashboard()
  {
    return view('Dashboard', ["title" => 'Dashboard']);
  }

  public function Cms()
  {
    return redirect(url('/cms/dashboard'));
  }

  public function gallery()
  {
    return view('Superadmin.gallery', ["title" => 'Gallery']);
  }
}
