<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $data = [
         "title"  => "Data Barang",
         "produk" => Produk::all()
      ];
      return view('produk.index', $data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title" => "Tambah Data Barang"
      ];
      return view('produk.create', $data);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validatedData = $request->validate([
         'nama_barang'   => 'required|string',
         'kode_barang'   => 'required|max:150|unique:produk,kode_barang',
         'satuan'        => 'required|string',
         'harga_satuan'  => 'required|numeric',
         'jumlah_barang' => 'required|numeric',
      ]);

      Produk::create($validatedData);

      return redirect('produks')->with('success', ' Data Barang berhasil dibuat.');
   }


   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $data = [
         "title" => "Edit Data Barang",
         "produk" => Produk::findOrFail($id)
      ];
      return view("produk.edit", $data);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,  Produk $produk)
   {
      $validatedData = $request->validate([
         'nama_barang'   => 'required|string',
         'kode_barang'   => 'required|max:150|unique:produk,kode_barang,' . $produk->id . ',id',
         'satuan'        => 'required|string',
         'harga_satuan'  => 'required|numeric',
         'jumlah_barang' => 'required|numeric',
      ]);

      Produk::where('id', $produk->id)
         ->update($validatedData);

      return redirect('produks')->with('success', ' Data telah diperbaharui!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $post = Produk::find($id);

      $post->delete();

      return back()->with('success', ' Data berhasil dihapus.');
   }
}
