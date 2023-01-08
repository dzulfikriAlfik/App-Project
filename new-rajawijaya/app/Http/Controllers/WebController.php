<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Services;
use App\Models\User;

class WebController extends Controller
{
  public function index()
  {
    $data = [
      "title"    => "Home Page",
      "company"  => CompanyProfile::all()->first(),
      "services" => Services::all(),
      "kegiatan" => Gallery::all()
    ];

    return view("web.index", $data);
  }

  public function tentangKami()
  {
    $data = [
      "title"      => "Tentang Kami",
      "company"    => CompanyProfile::all()->first(),
      "mitra_kami" => User::where("role", "mitra")->get()
    ];

    return view("web.tentang-kami", $data);
  }

  public function kegiatan()
  {
    $data = [
      "title"    => "Kegiatan",
      "company"  => CompanyProfile::all()->first(),
      "kegiatan" => Gallery::all()
    ];

    return view("web.kegiatan", $data);
  }

  public function mitra()
  {
    $data = [
      "title"      => "Mitra",
      "company"    => CompanyProfile::all()->first(),
      "mitra_kami" => User::where("role", "mitra")->get()
    ];

    return view("web.mitra", $data);
  }

  public function kontak()
  {
    $data = [
      "title"   => "Kontak",
      "company" => CompanyProfile::all()->first(),
    ];

    return view("web.kontak", $data);
  }
}
