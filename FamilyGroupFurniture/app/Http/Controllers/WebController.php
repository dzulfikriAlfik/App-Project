<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
  public function index()
  {
    $data = [
      "title"    => "Home Page"
    ];

    return view("web.index", $data);
  }

  public function tentangKami()
  {
    $data = [
      "title"      => "Tentang Kami",
      "company"    => dataCompany(),
      "mitra_kami" => User::where("role", "customer")->get()
    ];

    return view("web.tentang-kami", $data);
  }

  public function customer()
  {
    $data = [
      "title"      => "Mitra",
      "company"    => dataCompany(),
      "mitra_kami" => User::where("role", "customer")->get()
    ];

    return view("web.customer", $data);
  }

  public function kontak()
  {
    $data = [
      "title"   => "Kontak",
      "company" => dataCompany(),
    ];

    return view("web.kontak", $data);
  }
}
