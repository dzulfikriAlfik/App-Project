<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Kegiatan;
use App\Models\Mitra;
use App\Models\Services;

class WebController extends Controller
{
  public function index()
  {
    $data = [
      "title"    => "Home Page",
      "company"  => CompanyProfile::all()->first(),
      "services" => Services::all(),
      "kegiatan" => Kegiatan::join("galery_kegiatan", "kegiatan.id_kegiatan", "=", "galery_kegiatan.id_kegiatan")->select(["galery_kegiatan.*", "kegiatan.*"])->get()
    ];

    return view("web.index", $data);
  }

  public function tentangKami()
  {
    $data = [
      "title"      => "Tentang Kami",
      "company"    => CompanyProfile::all()->first(),
      "mitra_kami" => Mitra::all()
    ];

    return view("web.tentang-kami", $data);
  }

  public function kegiatan()
  {
    $data = [
      "title"    => "Kegiatan",
      "company"  => CompanyProfile::all()->first(),
      "kegiatan" => Kegiatan::join("galery_kegiatan", "kegiatan.id_kegiatan", "=", "galery_kegiatan.id_kegiatan")->select(["galery_kegiatan.*", "kegiatan.*"])->get()
    ];

    return view("web.kegiatan", $data);
  }

  public function mitra()
  {
    $data = [
      "title"      => "Mitra",
      "company"    => CompanyProfile::all()->first(),
      "mitra_kami" => Mitra::all()
    ];

    return view("web.mitra", $data);
  }

  public function kontak()
  {
    $data = [
      "title"    => "Kontak",
      "company"  => CompanyProfile::all()->first(),
    ];

    return view("web.kontak", $data);
  }
}
