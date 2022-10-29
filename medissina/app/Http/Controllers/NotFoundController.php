<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    //
    public function NotFound(){
        return view('NotFound', ["title" => 'Not Found']);
    }
}
