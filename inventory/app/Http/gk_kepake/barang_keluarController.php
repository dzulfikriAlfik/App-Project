<?php

namespace App\Http\Controllers;

use App\Models\barang_keluar;
use App\Models\rcv_barang_masuk;
use Illuminate\Http\Request;

class barang_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluars = barang_keluar::all(); 
        
        return view('post.index_barang_keluar',['barang_keluars' => $barang_keluars]);
    
    }

    public function list_barangkeluar(){
        $rcv_barang_masuk = rcv_barang_masuk::all();

        echo json_encode(array("data" => $rcv_barang_masuk));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form_barang_keluar');
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
        'No_bon' => 'required|unique:barang_keluars|max:150',
        'Tgl' => 'required', 
        'Kode_barang' => 'required', 
        'Nama_barang' => 'required',
        'Satuan'=> 'required', 
        'Qty' => 'required', 
        'Keterangan' => 'required', 
    ]);
    $input = $request->all();

$post = barang_keluar::create($input);

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
        $post = barang_keluar::findOrFail($id);
   
   return view('post.edit_barang_keluar', [
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
        'No_bon' => 'required|unique:barang_keluars|max:150',
        'Tgl' => 'required', 
        'Kode_barang' => 'required', 
        'Nama_barang' => 'required', 
        'Satuan' => 'required',
        'Qty' => 'required', 
        'Keterangan' => 'required', 
         ]);
               
         $post = barang_keluar::find($id)->update($request->all()); 
                
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
        $post = barang_keluar::find($id);

        $post->delete();
     
        return back()->with('success',' Penghapusan berhasil.');
     
    }
}
