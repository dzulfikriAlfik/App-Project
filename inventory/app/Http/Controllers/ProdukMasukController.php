<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembelian;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukMasukController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $data = [
         "title"        => "Produk Masuk",
         "produk_masuk" => ProdukMasuk::all()
      ];
      return view('produk-masuk.index', $data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title"     => "Tambah Data Produk Masuk",
         "pembelian" => Pembelian::all()
      ];
      return view('produk-masuk.create', $data);
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
         'tanggal_masuk' => 'required',
         'pembelian_id'  => 'required',
         'qty_terima'    => 'required|numeric',
         'keterangan'    => 'required'
      ];

      $validatedData = $request->validate($rules, ServicesController::costomMessageValidation());

      $pembelian = Pembelian::find($request->pembelian_id);

      $validatedData['qty_sisa'] = ($pembelian->qty_sisa - $request->qty_terima);
      // dd($validatedData);

      ProdukMasuk::create($validatedData);

      if ($request->keterangan == 'Stock supplier tidak memenuhi Qty Order') {
         $pembelian->update(['qty_sisa' => 0]);
      } else {
         $pembelian->update(['qty_sisa' => $validatedData['qty_sisa']]);
      }

      $query = Produk::all()->where('pembelian_id', $request->pembelian_id)->first();
      if ($query) {
         $jumlah_barang_db  = $query->jumlah_barang;
         $jumlah_barang_new = $jumlah_barang_db + $request->qty_terima;
         $query->update(['jumlah_barang' => $jumlah_barang_new]);
      } else {
         $next_id      = DB::select("SHOW TABLE STATUS LIKE 'produk_masuk'")[0]->Auto_increment;
         $produkCreate = [
            'produk_masuk_id' => ($next_id - 1),
            'kode_barang'     => $pembelian->kode_barang,
            'nama_barang'     => $pembelian->nama_barang,
            'satuan'          => $pembelian->satuan,
            'harga_satuan'    => $pembelian->harga_satuan,
            'pembelian_id'    => $validatedData["pembelian_id"],
            'jumlah_barang'   => $validatedData["qty_terima"]
         ];

         Produk::create($produkCreate);
      }

      return redirect('produk-masuk')->with('success', 'Data Penerimaan Barang berhasil dibuat.');
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
   public function destroy(ProdukMasuk $produk_masuk)
   {
      $produk_masuk->delete();

      return redirect('produk-masuk')->with('success', 'Data Pembelian berhasil dihapus.');
   }
}
