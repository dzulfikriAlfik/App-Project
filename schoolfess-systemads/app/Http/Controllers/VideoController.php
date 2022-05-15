<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
   //
   public function Video()
   {
      return view('Video', ["title" => 'Video']);
   }

   public function store(Request $request)
   {

      $validator = Validator::make($request->all(), []);
   }
}
