<?php

namespace App\Http\Controllers;

use File;
use App\Models\Gallery;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
  public function index()
  {
    $data = [
      "galleries" => Gallery::all(),
    ];

    return view("kegiatan.list", $data);
  }

  public function show(Gallery $gallery)
  {
    $data = [
      "gallery" => $gallery,
    ];

    return view("kegiatan.detail", $data);
  }

  public function create()
  {
    $data = [];

    return view("kegiatan.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nama_kegiatan' => 'required|max:128',
      'tanggal'       => 'required',
      'keterangan'    => 'required',
      'foto'          => 'required|image|file|max:1024|mimes:jpg,jpeg,png',
    ]);

    $validatedData['tanggal'] = date("Y-m-d", strtotime($request->tanggal));

    $foto = $request->file('foto');

    $fileName        = time() . "." . $foto->getClientOriginalExtension();
    $destinationPath = public_path('assets/img/gallery');
    $foto->move($destinationPath, $fileName);

    $validatedData['foto']   = $fileName;

    Gallery::create($validatedData);

    return redirect('/kegiatan/list')->with('success', 'Kegiatan baru berhasil ditambahkan!');
  }

  public function edit(Gallery $gallery)
  {
    $data = [
      "gallery" => $gallery,
    ];

    return view("kegiatan.edit", $data);
  }

  public function update(Request $request, Gallery $gallery)
  {
    $rules = [
      'nama_kegiatan' => 'required|max:128',
      'tanggal'       => 'required',
      'keterangan'    => 'required',
    ];

    $foto = $request->file('foto');

    if ($foto) {
      $rules["foto"] = 'image|file|max:1024|mimes:jpg,jpeg,png';
    }

    $validatedData = $request->validate($rules);

    if ($foto) {
      $oldfile = public_path("assets/img/gallery/{$gallery->foto}");
      File::delete($oldfile);

      $fileName        = time() . "." . $foto->getClientOriginalExtension();
      $destinationPath = public_path('assets/img/gallery');
      $foto->move($destinationPath, $fileName);

      $validatedData['foto']   = $fileName;
    }

    $validatedData['tanggal'] = date("Y-m-d", strtotime($request->tanggal));

    $gallery->update($validatedData);

    return redirect('/kegiatan/list')->with('success', 'Data kegiatan berhasil diubah!');
  }

  public function destroy(Gallery $gallery)
  {
    $oldfile = public_path("assets/img/gallery/{$gallery->foto}");
    File::delete($oldfile);

    $gallery->delete();

    return redirect('/kegiatan/list')->with('success', 'Data kegiatan berhasil dihapus!');
  }
}
