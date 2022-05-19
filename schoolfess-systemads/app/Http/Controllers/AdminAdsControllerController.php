<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAdsControllerController extends Controller
{
    public function index()
    {
        return view('adminads.PartnerLists', ["title" => "Partner Lists"]);
    }
}
