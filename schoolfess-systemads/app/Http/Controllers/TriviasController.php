<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriviasController extends Controller
{
    //
    public function Trivias(){
      return view('Trivias', ["title" => 'Trivias']);
    }
}
