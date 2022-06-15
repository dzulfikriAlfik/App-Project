<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\pengeluaran;
use App\Models\Post;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // pengeluaran::all = get ti model pengeluaran
        $pengeluarans = pengeluaran::all(); 
        // view
        return view('post.utama', ['pengeluarans' => $pengeluarans]);
    }  //post

    public function create()
    {
        //pemangilan form
        return view('post.form');
    }
    
    public function pilih()
    {
        $pengeluaran =DB::table('posts')->get();
        return view('Nama_Barang.Kode_add', compact('pengeluaran'));
        
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Toko' => 'required:pengeluarans|max:150',
            'No_Surat_jalan' => 'required', 
            'Alamat_Toko' => 'required', 
            'Nama_Barang' => 'required', 
            'Qty' => 'required', 
            'Keterangan' => 'required',
            'Harga_Satuan' =>'required',
            'Jumlah_Total' => 'required', 
         ]);

          $input = $request->all();

        $post = pengeluaran::create($input);
        
        return back()->with('success',' Post baru berhasil dibuat.');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $post = pengeluaran::findOrFail($id);
   
        return view('post.editkeluar', [
                'post' => $post
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
          //  'title' => 'required|unique:posts|max:150',
            //'body' => 'required', 
            'Nama_Toko' => 'required:pengeluarans|max:150',
            'No_Surat_jalan' => 'required', 
            'Alamat_Toko' => 'required', 
            'Nama_Barang' => 'required', 
            'Qty' => 'required', 
            'Keterangan' => 'required', 
            'Harga_Satuan' =>'required',
            'Jumlah_Total' => 'required', 
        
        
         ]);
               
         $post = pengeluaran::find($id)->update($request->all()); 
                
         return back()->with('success',' Data telah diperbaharui!');
       
    }
    public function destroy($id)
    {
        $post = pengeluaran::find($id);

        $post->delete();
     
        return back()->with('success',' Penghapusan berhasil.');
     
    }

    public function listProduct(){
        $Post = Post::all();
       echo json_encode(array("data" => $Post));
    }
    
}
