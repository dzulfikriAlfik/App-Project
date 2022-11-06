<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
  public function index()
  {
    $data = [
      "title" => "Berita",
      "news"  => Berita::all()
    ];

    return view("Superadmin.berita.index", $data);
  }

  public function add()
  {
    $data = [
      "title" => "Tambah Berita"
    ];

    return view("Superadmin.berita.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title'        => 'required',
      'description'  => 'required'
    ]);

    $validatedData['created_by']   = $request->user_id;
    $validatedData['updated_by']   = $request->user_id;

    Berita::create($validatedData);

    return redirect(url('/cms/berita'))->with('success', 'Data berita berhasil ditambahkan');
  }

  public function show($id)
  {
    $berita = Berita::join("users", "berita.created_by", "=", "users.user_id")
      ->select("berita.*", "users.user_id", "users.user_name", "users.user_image")
      ->where("id", $id)
      ->get()->first();

    $data = [
      "title"   => "Detail Berita",
      "berita"  => $berita
    ];

    return view("Superadmin.berita.detail", $data);
  }

  public function edit(Berita $berita)
  {
    $data = [
      "title"   => "Edit Berita",
      "berita" => $berita
    ];

    return view("Superadmin.berita.edit", $data);
  }

  public function update(Request $request, Berita $berita)
  {
    // dd($request);
    $validatedData = $request->validate([
      'title'        => 'required',
      'description'  => 'required'
    ]);

    $validatedData['updated_date'] = date("Y-m-d H:i:s");
    $validatedData['updated_by']   = $request->user_id;

    // dd($validatedData);
    Berita::where("id", $berita->id)->update($validatedData);

    return redirect(url('/cms/berita'))->with('success', 'Data kegiatan berhasil diubah');
  }

  public function destroy(Berita $berita)
  {
    Berita::destroy($berita->id);

    return redirect(url('/cms/berita'))->with('success', 'Berita berhasil dihapus');
  }
}
