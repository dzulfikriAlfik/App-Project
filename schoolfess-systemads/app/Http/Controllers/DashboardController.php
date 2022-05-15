<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function Dashboard(){
        return view('Dashboard', ["title" => 'Dashboard']);
    }
    public function Cms(){
        return redirect('/cms/dashboard');
    }
}
