<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
  public function index()
  {
    return view("Homepage.Index", [
      "title"  => "Homepage",
      "active" => "home-page"
    ]);
  }

  public function profileLembaga()
  {
    return view("Homepage.profile.index", [
      "title"  => "Profil Lembaga",
      "active" => "profil-lembaga"
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
      "title"  => "Informasi Kontak",
      "active" => "kontak"
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
    return view("Homepage.berita", [
      "title"  => "Berita",
      "active" => "berita"
    ]);
  }

  public function galery()
  {
    return view("Homepage.galery", [
      "title"  => "Galeri",
      "active" => "galeri"
    ]);
  }
}
