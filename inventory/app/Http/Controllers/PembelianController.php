<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\suplier;
use App\Models\Supplier;
use App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\data_barang;
use Illuminate\Http\Request;
use App\Http\Controllers\ServicesController;
use App\Models\ProdukMasuk;
use Symfony\Component\HttpFoundation\Response;

class PembelianController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $data = [
         "title"     => "Pembelian",
         "pembelian" => Pembelian::all()
      ];

      return view('pembelian.index', $data);
   }

   public function list_product(Produk $produk)
   {
      return response()->json([
         'status'  => 200,
         'message' => 'Data Found',
         'data'    => $produk
      ], Response::HTTP_OK);
   }

   public function list_suplier()
   {
      $suplier = Supplier::all();

      echo json_encode(array("data" => $suplier));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title"     => "Tambah Data Pembelian",
         "suppliers" => Supplier::all()
      ];
      return view('pembelian.create', $data);
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
         'no_po'         => 'required|max:30|unique:pembelian,no_po',
         'tanggal_po'    => 'required',
         'supplier_name' => 'required',
         'kode_barang'   => 'required|max:50|unique:pembelian,kode_barang',
         'nama_barang'   => 'required|max:50',
         'satuan'        => 'required|max:30',
         'qty_beli'      => 'required|numeric',
         'harga_satuan'  => 'required|numeric',
      ];

      $validatedData = $request->validate($rules, ServicesController::costomMessageValidation());

      $validatedData['qty_sisa'] = $request->qty_beli;

      Pembelian::create($validatedData);

      return redirect('pembelian')->with('success', ' Data Pembelian Barang berhasil dibuat.');
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
         "title"     => "Edit Data Pembelian",
         "pembelian" => Pembelian::findOrFail($id),
         "suppliers" => Supplier::all()
      ];
      return view("pembelian.edit", $data);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Pembelian $pembelian)
   {

      $rules = [
         'no_po'         => 'required|max:30|unique:pembelian,no_po,' . $pembelian->id . ',id',
         'tanggal_po'    => 'required',
         'supplier_name' => 'required',
         'kode_barang'   => 'required|max:50|unique:pembelian,kode_barang,' . $pembelian->id . ',id',
         'nama_barang'   => 'required|max:50',
         'satuan'        => 'required|max:30',
         'qty_beli'      => 'required|numeric',
         'harga_satuan'  => 'required|numeric',
      ];

      $validatedData = $request->validate($rules, ServicesController::costomMessageValidation());

      $pembelian->update($validatedData);

      return redirect('pembelian')->with('success', ' Data Pembelian telah diperbaharui!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Pembelian $pembelian)
   {
      // dd($pembelian->id);
      $produk_masuk = ProdukMasuk::where('pembelian_id', $pembelian->id);
      // $produk_masuk = $pembelian->produk_masuk->delete();
      // dd($produk_masuk);
      $produk_masuk->delete();
      $pembelian->delete();


      return redirect('pembelian')->with('success', 'Data Pembelian berhasil dihapus.');
   }

   // public function update(Request $request, Pembelian $pembelian)
   // {
   //    $rules = [
   //       'no_po'       => 'required|max:30|unique:pembelian,no_po,' . $pembelian->id . ',id',
   //       'supplier_id' => 'required',
   //       'tanggal_po'  => 'required',
   //       'produk_id'   => 'required',
   //       'qty'         => 'required|numeric'
   //    ];

   //    $message = [
   //       'no_po.required'      => 'No. PO tidak boleh kosong',
   //       'tanggal_po.required' => 'Tanggal PO tidak boleh kosong'
   //    ];

   //    $qty_pembelian = $request->qty;
   //    $qty_db        = $pembelian->qty;
   //    $qty_produk    = $pembelian->produk->jumlah_barang;
   //    $qty_final     = $qty_produk - ($qty_pembelian - $qty_db);

   //    if ($qty_pembelian != $qty_db) {
   //       $rules['qty']     = 'required|numeric|max:' . $qty_produk;
   //       $message['qty.max'] = 'Quantity tidak boleh melebihi jumlah stok barang tersedia : ' . $qty_produk;
   //       if ($qty_pembelian > $qty_db) {
   //          $qty_final = $qty_produk - ($qty_pembelian - $qty_db);
   //       } else {
   //          $qty_final = $qty_produk + ($qty_db - $qty_pembelian);
   //       }
   //    }

   //    $validatedData = $request->validate($rules, $message);

   //    $validatedData['qty_sisa'] = $request->qty - $pembelian->qty_terkirim;

   //    if ($qty_pembelian < $pembelian->qty_terkirim) {
   //       return back()->with('error', 'Quantity tidak boleh kurang dari quantity yang sudah terkirim : ' . $pembelian->qty_terkirim);
   //    }

   //    Pembelian::where('id', $pembelian->id)
   //       ->update($validatedData);

   //    $produk = Produk::find($request->produk_id);
   //    $produk->update(['jumlah_barang' => $qty_final]);

   //    return redirect('pembelian')->with('success', ' Data Pembelian telah diperbaharui!');
   // }
}
