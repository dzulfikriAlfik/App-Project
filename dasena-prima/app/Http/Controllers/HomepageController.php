<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
   public function index()
   {
      $company = CompanyProfile::all()->first();
      $data = [
         "title" => "Homepage",
         "company" => $company
      ];
      return view("Homepage.index", $data);
   }
}
