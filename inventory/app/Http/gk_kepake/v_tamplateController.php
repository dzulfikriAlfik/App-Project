<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class v_tamplateController extends Controller
{
    public function dashboard()
    {
        return view('layouts.v_tamplate');
    }
}
