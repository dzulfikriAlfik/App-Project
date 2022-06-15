//views/post/edit.blade.php
@extends('layouts.app')
@section('title', 'Post Edit')
@section('content')
<div class="wrapper">
  <h1>Edit Post</h1>
  
  @if (session('success'))
  <div class="alert-success">
    <p>{{ session('success') }}</p>
  </div>
  @endif
  
  @if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <a href="{{ route('pengeluarans.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>

  
  <form method="POST" action="{{ url('pengeluarans', $post->id ) }}">
    @csrf
    @method('PUT')
    <p>
    <label>Nama_Toko:</label>
    <input name="Nama_Toko" value="{{ $post->Nama_Toko }}" type="text" placeholder="Nama_Toko..."> 
    </p>
    <p>
    <label>No_Surat_jalan:</label>
    <input name="No_Surat_jalan" value="{{ $post->No_Surat_jalan }}" type="text" placeholder="No_surat_jalan...">
    </p>
    <p>
    <label>Alamat_Toko:</label>
    <input name="Alamat_Toko" value="{{  $post->Alamat_Toko}}" type="text" placeholder="Alamat_toko">
    </p>
    <p>
    <label>Nama_Barang:</label>
    <input name="Nama_Barang" value="{{ $post->Nama_Barang }}" type="text" placeholder="Nama_Barang">
    </p>
    <p>
    <label>Qty:</label>
    <input name="Qty" value="{{ $post->Qty}}" type="text" placeholder="Qty">
    </p>
    <p>
    <label>Keterangan:</label>
    <input name="Keterangan" value="{{  $post->Keterangan}}" type="text" placeholder="Keterangan">
    </p>
    <p>
    <label>Harga_Satuan:</label>
    <input name="Harga_Satuan" value="{{  $post->Harga_Satuan}}" type="text" placeholder="Keterangan">
    </p>
    <p>
    <label>Jumlah_Total:</label>
    <input name="Jumlah_Total" value="{{  $post->Jumlah_Total}}" type="text" placeholder="Keterangan">
    </p>
   
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection

