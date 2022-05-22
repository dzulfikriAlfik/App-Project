<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
   public function set_ads()
   {
      $data = [
         "title" => "Set Ads"
      ];
      return view('Partner.SetAds', $data);
   }
}
