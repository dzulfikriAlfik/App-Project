<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
   public function manage_ads()
   {
      $data = [
         "title" => "Manage Ads"
      ];
      return view('Partner.ManageAds', $data);
   }

   public function show_detail(Ads $ads)
   {
      $data = [
         "title" => "Detail Ads",
         "ads"   => $ads
      ];
      return view("Partner.ShowDetailAds", $data);
   }
}
