<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembelian;
use App\Models\ProdukKeluar;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukKeluarController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $data = [
         "title"         => "Produk Keluar",
         "produk_keluar" => ProdukKeluar::all()
      ];
      return view("produk-keluar.index", $data);
   }

   public function list_pembelian(Pembelian $pembelian)
   {
      return response()->json([
         'status'  => 200,
         'message' => 'Data Found',
         'data'    => $pembelian
      ], Response::HTTP_OK);
   }

   public function list_produk(Produk $produk)
   {
      return response()->json([
         'status'  => 200,
         'message' => 'Data Found',
         'data'    => $produk
      ], Response::HTTP_OK);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title"   => "Tambah Barang Keluar",
         "produks" => Produk::all()
      ];
      // dd($data);
      return view('produk-keluar.create', $data);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $rules = [
         'tanggal_keluar' => 'required',
         'produk_id'      => 'required',
         'qty_kirim'      => 'required',
      ];

      $produk = Produk::find($request->produk_id);
      // dd($produk);

      $qty_produk = $produk->jumlah_barang;

      // $rules['qty_kirim']     = 'required|numeric|max:' . $qty_produk;

      $validatedData = $request->validate($rules, ServicesController::costomMessageValidation());

      $qty_sisa = $qty_produk - $request->qty_kirim;

      $validatedData['qty_sisa']    = $qty_sisa;
      $validatedData['kode_barang'] = $produk->kode_barang;
      $validatedData['nama_barang'] = $produk->nama_barang;

      ProdukKeluar::create($validatedData);

      $produk->update([
         'jumlah_barang' => $validatedData['qty_sisa']
      ]);

      return redirect('produk-keluar')->with('success', ' Data Produk Keluar berhasil dibuat.');
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
   public function edit(ProdukKeluar $produk_keluar)
   {
      $data = [
         "title"         => "Tambah Barang Keluar",
         "produk"       => Produk::find($produk_keluar->produk_id),
         "produk_keluar" => $produk_keluar
      ];
      // dd($data);
      return view('produk-keluar.edit', $data);
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
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      ProdukKeluar::find($id)->delete();

      return redirect('produk-keluar')->with('success', 'Data Produk Keluar berhasil dihapus.');
   }
}
