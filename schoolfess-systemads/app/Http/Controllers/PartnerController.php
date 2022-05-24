<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class PartnerController extends Controller
{
   public function manage_ads()
   {
      $data = [
         "title"     => "Manage Ads"
      ];
      return view('Partner.ManageAds', $data);
   }

   public function show_detail(Ads $ads)
   {
      $data = [
         "title"     => "Detail Ads",
         "ads"       => $ads
      ];
      return view("Partner.ShowDetailAds", $data);
   }

   public function edit_ads_page(Ads $ads)
   {
      $data = [
         "title"     => "Edit Ads",
         "ads"       => $ads
      ];
      return view("Partner.EditAdsPage", $data);
   }
}
