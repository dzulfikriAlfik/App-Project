<?php

namespace App\Http\Controllers;

use App\Models\permintaan_produksi;
use Illuminate\Http\Request;

class permintaan_produksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan_produksis = permintaan_produksi::all(); 
        
        return view('post.indexpermintaan_produksi',
        ['permintaan_produksi' => $permintaan_produksis]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form_permintaan_produksi');
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
            'No_permintaan' => 'required|unique:permintaan_produksis|max:150',//nama db
            'Nama_suplier' => 'required',
            'Tgl_permintaan' => 'required', 
            'Nama_barang' => 'required', 
            'Qty_barang' => 'required', 
            'Satuan_barang' => 'required', 
          ]);
          $input = $request->all();

          $post = permintaan_produksi::create($input);
         
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
        $post = permintaan_produksi::findOrFail($id);
   
   return view('post.editpermintaan_produksi', [
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
            'No_permintaan' => 'required|unique:permintaan_produksis|max:150',//nama db
            'Nama_suplier' => 'required',
            'Tgl_permintaan' => 'required', 
            'Nama_barang' => 'required', 
            'Qty_barang' => 'required', 
            'Satuan_barang' => 'required', 
         ]);
               
         $post = permintaan_produksi::find($id)->update($request->all()); 
                
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
        $post = permintaan_produksi::find($id);

        $post->delete();
     
        return back()->with('success',' Penghapusan berhasil.');

    }
}
