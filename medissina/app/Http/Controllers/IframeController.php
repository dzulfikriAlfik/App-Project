<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IframeController extends Controller
{
  public function gallery(Request $request)
  {
    $data = [
      "title" => "Iframe Gallery"
    ];

    return view("Iframe.gallery", $data);
  }
}
