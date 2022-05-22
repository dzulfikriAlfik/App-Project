<?php

namespace App\Http\Controllers;

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
}
