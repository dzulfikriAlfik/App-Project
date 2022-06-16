<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\suplier;
use App\Models\data_barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $pembelian = Pembelian::all();
      // dd($pembelian);
      $data = [
         "pembelian" => $pembelian
      ];

      return view('post.indexpembelian',$data);
   }

   public function list_product()
   {
      $ba = data_barang::all();

      echo json_encode(array("data" => $ba));
   }

   public function list_suplier()
   {
      $suplier = suplier::all();

      echo json_encode(array("data" => $suplier));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('post.pembelian.create');
   }



   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $request->validate([
         'No_po' => 'required|:pembelians|max:150',
         'Tgl_po' => 'required',
         'Suplier' => 'required',
         'Kode_barang' => 'required',
         'Nama_barang' => 'required',
         'Satuan' => 'required',
         'Qty_po' => 'required',
         'Harga_satuan' => 'required',
         'Total_harga' => 'required',
      ]);

      $input = $request->all();

      $post = Pembelian::create($input);

      return back()->with('success', ' Post baru berhasil dibuat.');
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
      $post = Pembelian::findOrFail($id);

      return view('post.editpembelian', [
         'post' => $post
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $request->validate([
         'No_po' => 'required|:pembelians|max:150',
         'Tgl_po' => 'required',
         'Suplier' => 'required',
         'Kode_barang' => 'required',
         'Nama_barang' => 'required',
         'Satuan' => 'required',
         'Qty_po' => 'required',
         'Harga_satuan' => 'required',
         'Total_harga' => 'required',

      ]);

      $post = Pembelian::find($id)->update($request->all());

      return back()->with('success', ' Data telah diperbaharui!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $post = Pembelian::find($id);
      $post->delete();

      return back()->with('success', ' Penghapusan berhasil.');
   }
}
