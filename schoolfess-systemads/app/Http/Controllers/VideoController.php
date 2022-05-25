<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
   //
   public function Video()
   {
      return view('Admin.Video', ["title" => 'Video']);
   }
}
