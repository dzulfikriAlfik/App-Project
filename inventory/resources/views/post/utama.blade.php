@extends('layouts.app')
@section('title', 'Semua Post')
@section('content')
<div class="wrapper">
  <h1 style="text-align: center;">Semua Post</h1>
  
  <a href="{{ route('pengeluarans.create')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Tambah</button></a>
<!-- creat di atas untuk menampilkan data dari database -->
  <table style="width:100%">
    <thead>
      <tr>
        <th>Nama_Toko</th>
        <th>No_Surat_jalan</th>
        <th>Alamat_Toko</th>
        <th>Nama_Barang</th>
        <th>Qty </th>
        <th>Keterangan</th>
        <th>Harga_Satuan</th>
        <th>Jumlah_Total</th>
      
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pengeluarans as $post)
      <tr>
      <td style="width: 200px" >{{ $post->Nama_Toko}}</td>
      <td style="width: 500px" >{{ $post->No_Surat_jalan}}</td>
      <td style="width: 20px" >{{ $post->Alamat_Toko }}</td>
      <td style="width: 20px" >{{ $post->Nama_Barang }}</td>
      <td style="width: 20px" >{{ $post->Qty }}</td>
      <td style="width: 20px" >{{ $post->Keterangan}}</td>
      <td style="width: 20px" >{{ $post->Harga_Satuan}}</td>
      <td style="width: 20px" >{{ $post->Jumlah_Total}}</td>
      
      <!--  <td style="width: 100px"><button class="btn-green">Edit</button></td>
        <td style="width: 100px"><button class="btn-red">Hapus</button></td>
        <td style="width: 100px"> <a href= "http://localhost:8000/posts/{{ $post->id}}/edit"><button class="btn-green">Edit</button></a></td>
-->
<td style="width: 100px"> <a href= "http://localhost:8000/pengeluarans/{{ $post->id}}/edit"><button class="btn-green">Edit</button></a></td>

<form method="POST" action="{{ url('pengeluarans', $post->id ) }}"> 
@csrf
@method('DELETE')
<td style="width: 100px">   
<a href= "http://localhost:8000/pengeluarans/{{ $post->id}}"><button class="btn-red">Hapus</button></td>

</form>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
