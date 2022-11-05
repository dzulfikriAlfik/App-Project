<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

  public function index()
  {
    $data = [
      "title"     => "Gallery",
      "galleries" => Gallery::all()
    ];

    return view("Superadmin.gallery.index", $data);
  }

  public function add()
  {
    $data = [
      "title" => "Tambah Gallery"
    ];

    return view("Superadmin.gallery.add", $data);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title'        => 'required',
      'description'  => 'required',
      'image'        => 'image|file|max:1024',
      'gallery_date' => 'required'
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('gallery-images');
    }

    $validatedData['gallery_date'] = date("Y-m-d", strtotime($request->gallery_date));
    $validatedData['created_by']   = $request->user_id;
    $validatedData['updated_by']   = $request->user_id;

    Gallery::create($validatedData);

    return redirect(url('/cms/gallery'))->with('success', 'Data kegiatan berhasil ditambahkan');
  }

  public function show($id)
  {
    $gallery = Gallery::join("users", "gallery.created_by", "=", "users.user_id")
      ->select("gallery.*", "users.user_id", "users.user_name", "users.user_image")
      ->where("id", $id)
      ->get()->first();

    $data = [
      "title"   => "Detail Gallery",
      "gallery" => $gallery
    ];

    return view("Superadmin.gallery.detail", $data);
  }

  public function edit(Gallery $gallery)
  {
    $data = [
      "title"   => "Edit Gallery",
      "gallery" => $gallery
    ];

    return view("Superadmin.gallery.edit", $data);
  }

  public function update(Request $request, Gallery $gallery)
  {
    // dd($request);
    $validatedData = $request->validate([
      'title'        => 'required',
      'description'  => 'required',
      'image'        => 'image|file|max:1024',
      'gallery_date' => 'required'
    ]);

    if ($request->file('image')) {
      if ($request->old_image) {
        Storage::delete($request->old_image);
      }
      $validatedData['image'] = $request->file('image')->store('gallery-images');
    }

    $validatedData['gallery_date'] = date("Y-m-d", strtotime($request->gallery_date));
    $validatedData['updated_date'] = date("Y-m-d H:i:s");
    $validatedData['updated_by']   = $request->user_id;

    // dd($validatedData);
    Gallery::where("id", $gallery->id)->update($validatedData);

    return redirect(url('/cms/gallery'))->with('success', 'Data kegiatan berhasil ditambahkan');
  }

  public function destroy(Gallery $gallery)
  {
    Storage::delete($gallery->image);
    Gallery::destroy($gallery->id);

    return redirect(url('/cms/gallery'))->with('success', 'Gallery berhasil dihapus');
  }
}
