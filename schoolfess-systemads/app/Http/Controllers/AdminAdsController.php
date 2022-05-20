<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ads;
use App\Models\Companytype;
use Illuminate\Http\Request;

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

    public function ads_lists()
    {
        $company = User::all();
        $data = [
            "title" => "Ads Lists",
            "company_name" => $company->unique("user_company")->where('user_company', '!=', "")
        ];
        return view("adminads.AdsLists", $data);
    }
}
