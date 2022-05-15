<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemsController extends Controller
{
    //
    public function Systems(){
        return view('Systems', ["title" => 'Systems']);
    }
}
