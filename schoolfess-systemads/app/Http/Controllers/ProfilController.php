<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //
    public function SelayangPandang(){
		return view('SelayangPandang', ["title" => 'Profil']);
	}
 
	public function VisiMisi(){
		return view('VisiMisi', ["title" => 'Profil']);
	}
 
	public function StrukturOrganisasi(){
		return view('StrukturOrganisasi', ["title" => 'Profil']);
	}
}
