<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\rcv_barang_masuk;
use Illuminate\Http\Request;

class rcv_barang_masukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $rcv_barang_masuks = rcv_barang_masuk::all(); 
        
        return view('post.indexrcv_barang_masuk',
        ['rcv_barang_masuks' => $rcv_barang_masuks]);
    
    }
    public function list_po(){
        $pembelian = pembelian::all();

        echo json_encode(array("data" => $pembelian));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form_rcv_barang_masuk');
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
            'No_po' => 'required|unique:rcv_barang_masuks|max:150',
            'Tgl_po' => 'required', 
            'Nama_suplier' => 'required',
            'Tgl_rcv' => 'required',
            'No_rcv' => 'required', 
            'Kode' => 'required',
            'Nama_barang' => 'required',
            'Qty_po' => 'required',
            'Qty_rcv' => 'required',
            'Satuan' => 'required', 
            'Keterangan' => 'required',      
        ]);
        $input = $request->all();

  $post = rcv_barang_masuk::create($input);
 
  return back()->with('success',' Post baru berhasil dibuat.');
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
        $post = rcv_barang_masuk::findOrFail($id);
   
   return view('post.edit_rcv_barang', [
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
            'No_po' => 'required|unique:rcv_barang_masuks|max:150',
            'Tgl_po' => 'required', 
            'Nama_suplier' => 'required',
            'Tgl_rcv' => 'required',
            'No_rcv' => 'required', 
            'Kode' => 'required',
            'Nama_barang' => 'required',
            'Qty_po' => 'required',
            'Qty_rcv' => 'required',
            'Satuan' => 'required', 
            'Keterangan' => 'required',      
         ]);
               
         $post = rcv_barang_masuk::find($id)->update($request->all()); 
                
         return back()->with('success',' Data telah diperbaharui!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = rcv_barang_masuk::find($id);

        $post->delete();
     
        return back()->with('success',' Penghapusan berhasil.');
     
    }
}
