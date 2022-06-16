<?php
namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\pembelian;
use Illuminate\Http\Request;
//coba

use App\Models\Post;

class PostController extends Controller
{


public function index()
{
   $posts = Post::all(); 
        
   return view('post.index', ['posts' => $posts]); 
}
//coba data pencarian
public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = DB::table('posts')
		->where('No_Penerimaan','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('index',['posts' => $posts]);

	}


//coba  data pencarian


    public function create()
    {
        return view('post.create');
    }
    //create
    public function pilih()
    {
        $Post =DB::table('pembelians')->get();
        return view('No_po.Kode_add', compact('Post'));
        
    }
   


    public function store(Request $request)
     {
       // dd($request);
        $request->validate([
            
            'No_Penerimaan' => 'required|unique:posts|max:150',
            'Kode' => 'required', 
            'Suplier'=> 'required',
            'Nama_Barang'=> 'required',
            'Satuan'=> 'required',
            'Qty_Po'=> 'required',
            'Qty_Penerimaan'=> 'required',
            'Keterangan'=> 'required',
            'No_po'=> 'required',
            
            
        ]);
        
          $input = $request->all();
        
          $post = Post::create($input);
         
          return back()->with('success',' Post baru berhasil dibuat.');
    }

    //coba
            public function edit($id)
        {
        $post = Post::findOrFail($id);
        
        return view('post.edit', [
                'post' => $post
        ]);
        }

        public function update(Request $request, $id)
        {
        $request->validate([
            // 'No_Penerimaan' => 'required|unique:posts|max:150',
         //  jika pake unique data harus di ubah
            'No_Penerimaan' => 'required:posts|max:150',
            'Kode' => 'required',
            'Suplier'=> 'required',
            'Nama_Barang'=> 'required',
            'Satuan'=> 'required',
            'Qty_Po'=> 'required',
            'Qty_Penerimaan'=> 'required',
            'Keterangan'=> 'required',
            'No_po'=> 'required',
            
            
        ]);
                
        $post = Post::find($id)->update($request->all()); 
                
        return back()->with('success',' Data telah diperbaharui!');
            
     }

        public function destroy($id)
    {
    $post = Post::find($id);

    $post->delete();

    return back()->with('success',' Penghapusan berhasil.');
    }

    public function listProduct(){
        $pembelian = pembelian::all();
        echo json_encode(array("data" => $pembelian));
        }
    public function list_data(){
        $pembelian = pembelian::all();
        echo json_encode(array("data" => $pembelian));
    }
}
  