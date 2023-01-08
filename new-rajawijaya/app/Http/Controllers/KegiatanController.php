<?php

namespace App\Http\Controllers;

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
    //
  }

  public function create()
  {
    $data = [];

    return view("kegiatan.add", $data);
  }

  public function store(Request $request)
  {
    //
  }

  public function edit(Gallery $gallery)
  {
    //
  }

  public function update(Request $request, Gallery $gallery)
  {
    //
  }

  public function destroy(Gallery $gallery)
  {
    $oldfile = public_path("assets/img/gallery/{$gallery->foto}");
    File::delete($oldfile);

    $gallery->delete();

    return redirect('/kegiatan/list')->with('success', 'Data kegiatan berhasil dihapus!');
  }
}
