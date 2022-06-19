<?php

namespace App\Http\Controllers;

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
         "title" => "Produk Keluar",
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

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title"     => "Tambah Barang Keluar",
         "pembelian" => Pembelian::all()
      ];
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
         'pembelian_id'   => 'required',
      ];

      $message = [
         'tanggal_keluar.required' => "Tanggal Keluar tidak boleh kosong",
         'pembelian_id.required' => "No. PO tidak boleh kosong"
      ];

      $pembelian = Pembelian::find($request->pembelian_id);

      $qty_pembelian    = $pembelian->qty_sisa;

      $rules['qty_kirim']     = 'required|numeric|max:' . $qty_pembelian;
      $message['qty_kirim.max'] = 'Quantity Kirim tidak boleh melebihi quantity pembelian : ' . $qty_pembelian;

      $validatedData = $request->validate($rules, $message);

      $qty_sisa = $qty_pembelian - $request->qty_kirim;

      $validatedData['qty_sisa'] = $qty_sisa;

      ProdukKeluar::create($validatedData);

      $pembelian->update([
         'qty_terkirim' => ($pembelian->qty_terkirim + $request->qty_kirim),
         'qty_sisa' => $validatedData['qty_sisa']
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
   public function edit($id)
   {
      //
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
