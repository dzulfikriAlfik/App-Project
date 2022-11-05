<?php

namespace App\Http\Controllers;

use App\Models\Masukan;
use Illuminate\Http\Request;

class MasukanController extends Controller
{

  public function index()
  {
    $data = [
      "title"   => "Pesan masukan",
      "masukan" => Masukan::all()
    ];

    return view("Superadmin.masukan.index", $data);
  }

  public function show(Masukan $masukan)
  {
    $data = [
      "title"   => "Detail Masukan",
      "masukan" => $masukan
    ];

    return view("Superadmin.masukan.detail", $data);
  }

  public function destroy(Masukan $masukan)
  {
    Masukan::destroy($masukan->id);

    return redirect(url('/cms/masukan'))->with('success', 'Masukan berhasil dihapus');
  }
}
