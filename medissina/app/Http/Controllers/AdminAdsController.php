<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\AdsType;
use App\Models\AdsPlatform;
use App\Models\Companytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAdsController extends Controller
{
  public function index()
  {
    $data = [
      "title"        => "Partner Lists",
      "company_type" => Companytype::all()
    ];
    return view('adminads.PartnerLists', $data);
  }

  public function profile()
  {
    $data = [
      "title" => "Update Profile"
    ];
    return view("Adminads.UserProfile", $data);
  }

  public function partner_detail(User $user)
  {
    $company_type = Companytype::where('company_type_id', $user->user_company_type)->first();
    $data = [
      "title" => "Detail Partner",
      "user"  => $user,
      "company_type" => $company_type->company_type
    ];
    return view("adminads.PartnerDetail", $data);
  }

  public function ads_lists()
  {
    $company = User::all();
    $data    = [
      "title"        => "Ads Lists",
      "company_name" => $company->unique("user_company")->where('user_company', '!=', "")
    ];
    return view("adminads.AdsLists", $data);
  }

  public function show_detail(Ads $ads)
  {
    $ads_type = new AdsType();
    $data     = [
      "title"         => "Detail Ads",
      "ads"           => $ads,
      "ads_type_name" => $ads_type->getAdsTypePlatform($ads->ads_type)
    ];
    return view("Adminads.ShowDetailAds", $data);
  }

  public function ads_type()
  {
    $ads_platform = AdsPlatform::all()->where("ads_platform_status", "!=", 0);

    $data = [
      "title"        => "Ads Type",
      "ads_platform" => $ads_platform
    ];
    return view("Adminads.AdsType", $data);
  }

  public function ads_platform()
  {
    $data = [
      "title" => "Ads Platform"
    ];
    return view("Adminads.AdsPlatform", $data);
  }

  public function voucher()
  {
    $data = [
      "title" => "Tambah Voucher"
    ];
    return view("Adminads.Voucher", $data);
  }
}
