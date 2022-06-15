@extends('layouts.app')
@section('title', 'Semua Post')
@section('content')
<div class="wrapper">

   < <h1 style="text-align: center;">Semua Post</h1>
      <a href="{{ route('posts.create')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Tambah</button></a>

      <table style="width:100%">
         <thead>
            <tr>
               <th>No_Peneriman</th>
               <th>Kode</th>
               <th>Suplier</th>
               <th>Nama_Barang</th>
               <th>Satuan</th>
               <th>Qty_Po </th>
               <th>Qty_Penerimaan </th>
               <th>Keterangan</th>
            </tr>
         </thead>
         <tbody>
            <!-- coba cari -->
            <p>Cari Data Pegawai :</p>
            <form action="/posts/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari posts .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
            </form>


            <!-- coba -->
            @foreach ($posts as $post)
            <tr>
               <!--  <td style="width: 200px" >{{ $post->title}}</td> -->
               <!--  <td style="width: 500px" >{{ $post->body }}</td> -->
               <td style="width: 20px">{{ $post->No_Penerimaan }}</td>
               <td style="width: 20px">{{ $post->Kode }}</td>
               <td style="width: 20px">{{ $post->Suplier }}</td>
               <td style="width: 20px">{{ $post->Nama_Barang }}</td>
               <td style="width: 20px">{{ $post->Satuan }}</td>
               <td style="width: 20px">{{ $post->Qty_Po }}</td>
               <td style="width: 20px">{{ $post->Qty_Penerimaan }}</td>
               <td style="width: 20px">{{ $post->Keterangan }}</td>

               <td style="width: 100px"> <a href="http://localhost:8000/posts/{{ $post->id}}/edit"><button class="btn-green">Edit</button></a></td>

               <form method="POST" action="{{ url('posts', $post->id ) }}">
                  @csrf
                  @method('DELETE')
                  <td style="width: 100px">
                     <a href="http://localhost:8000/posts/{{ $post->id}}"><button class="btn-red">Hapus</button></td>

               </form>
            </tr>
            @endforeach
         </tbody>
      </table>
</div>
@endsection
