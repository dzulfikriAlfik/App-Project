<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\ProfileLembaga;
use App\Models\User;

class HomeController extends Controller
{
  public function index()
  {
    $galleries = Gallery::join("users", "gallery.created_by", "=", "users.user_id")
      ->select("gallery.*", "users.user_id", "users.user_name", "users.user_image")
      ->get();

    return view("Homepage.index", [
      "title"     => "Homepage",
      "active"    => "home-page",
      "lembaga"   => ProfileLembaga::all()->first(),
      "strukturs" => $this->struktur(),
      "staffs"    => $this->staff(),
      "galleries" => array_slice((array) $galleries, 0, 3)
    ]);
  }

  public function staff()
  {
    return User::where("user_role", "!=", "superadmin")
      ->where("user_role", "!=", "kepala-sekolah")
      ->where("user_role", "!=", "bendahara")
      ->where("user_role", "!=", "tata-usaha")
      ->where("user_role", "!=", "operator")
      ->get();
  }

  public function struktur()
  {
    return User::where("user_role", "!=", "superadmin")
      ->where("user_role", "!=", "guru")
      ->orderBy("user_role_order", "ASC")
      ->get();
  }

  public function profileLembaga()
  {
    return view("Homepage.profile.index", [
      "title"     => "Profil Lembaga",
      "active"    => "profil-lembaga",
      "lembaga"   => ProfileLembaga::all()->first(),
      "staffs"    => $this->staff(),
      "strukturs" => $this->struktur()
    ]);
  }

  public function siswaKurikulum()
  {
    return view("Homepage.siswa.kurikulum", [
      "title"  => "Kurikulum",
      "active" => "kurikulum"
    ]);
  }

  public function siswaEkskul()
  {
    return view("Homepage.siswa.ekskul", [
      "title"  => "Ekstrakulikuler",
      "active" => "ekskul"
    ]);
  }

  public function infoKontak()
  {
    return view("Homepage.info.kontak", [
      "title"   => "Informasi Kontak",
      "active"  => "kontak",
      "lembaga" => ProfileLembaga::all()->first()
    ]);
  }

  public function infoBeasiswa()
  {
    return view("Homepage.info.beasiswa", [
      "title"  => "Informasi Beasiswa",
      "active" => "beasiswa"
    ]);
  }

  public function infoLayanan()
  {
    return view("Homepage.info.layanan", [
      "title"  => "Informasi Layanan dan Fasilitas",
      "active" => "layanan"
    ]);
  }

  public function berita()
  {
    $berita = Berita::join("users", "berita.created_by", "=", "users.user_id")
      ->select("berita.*", "users.user_id", "users.user_name", "users.user_image")
      ->get();

    $data = [
      "title"  => "Berita",
      "active" => "berita",
      "berita" => $berita
    ];

    return view("Homepage.berita", $data);
  }

  public function galery()
  {
    $galleries = Gallery::join("users", "gallery.created_by", "=", "users.user_id")
      ->select("gallery.*", "users.user_id", "users.user_name", "users.user_image")
      ->get();

    $data = [
      "title"     => "Galeri",
      "active"    => "galeri",
      "galleries" => $galleries
    ];

    return view("Homepage.galery", $data);
  }
}
