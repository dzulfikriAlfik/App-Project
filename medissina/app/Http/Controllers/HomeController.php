<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\ProfileLembaga;

class HomeController extends Controller
{
  public function index()
  {
    return view("Homepage.index", [
      "title"  => "Homepage",
      "active" => "home-page"
    ]);
  }

  public function profileLembaga()
  {
    return view("Homepage.profile.index", [
      "title"   => "Profil Lembaga",
      "active"  => "profil-lembaga",
      "lembaga" => ProfileLembaga::all()->first()
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
