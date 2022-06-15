<?php

namespace App\Http\Controllers;

use App\Models\data_barang;
use Illuminate\Http\Request;

class data_barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barangs = data_barang::all(); 
        
        return view('post.index_data_barang',['data_barangs' => $data_barangs]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form_data_barang');
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
            'Kode_barang' => 'required|:data_barangs|max:150',
            'Nama_barang' => 'required',
            'Harga_barang' => 'required', 
           

          ]);
            
          $input = $request->all();
        
          $post = data_barang::create($input);
         
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
        $post = data_barang::findOrFail($id);
   
        return view('post.editdata_barang', [
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
            'Kode_barang' => 'required|:data_barangs|max:150',
            'Nama_barang' => 'required',
            'Harga_barang' => 'required', 
         ]);
               
         $post = data_barang::find($id)->update($request->all()); 
                
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
        $post = data_barang::find($id);

        $post->delete();
     
        return back()->with('success',' Penghapusan berhasil.');
     
    }
}
