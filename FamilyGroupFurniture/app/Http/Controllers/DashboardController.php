<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "user" => auth()->user(),
        ];

        return view("dashboard.index", $data);
    }
}
