<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companytype;

class AdminAdsController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Partner Lists",
            "company_type" => Companytype::all()
        ];
        return view('adminads.PartnerLists', $data);
    }
}
