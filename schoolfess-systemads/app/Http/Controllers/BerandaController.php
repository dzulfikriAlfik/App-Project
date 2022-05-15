<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class BerandaController extends Controller
{
    //
    public function Beranda(){
        return view('Beranda', ["title" => 'Beranda']);
    }
    public function Peraturan(){
        return view('Peraturan', ["title" => 'Beranda']);
    }
    public function DetailPeraturan(){
        return view('DetailPeraturan', ["title" => 'Beranda']);
    }
}
