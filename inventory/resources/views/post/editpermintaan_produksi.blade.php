//views/post/editpermintaan_produksi.blade.php
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
  <!--<a href="{{ route('pembelians.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>
-->
  
  <form method="POST" action="{{ url('permintaan_produksis', $post->id ) }}">
    @csrf
    @method('PUT')      
    <input name="No_permintaan" value="{{ $post->No_permintaan }}" type="text" placeholder="No_permintaan..."> 
    <input name="Nama_suplier" value="{{ $post->Nama_suplier }}" type="text" placeholder="Nama_suplier...">
    <input name="Tgl_permintaan" value="{{ $post->Tgl_permintaan }}" type="text" placeholder="Tgl_permintaan...">
    <input name="Nama_barang" value="{{ $post->Nama_barang }}" type="text" placeholder="Nama_barang...">
    <input name="Qty_barang" value="{{ $post->Qty_barang }}" type="text" placeholder="Qty_barang...">
    <input name="Satuan_barang" value="{{ $post->Satuan_barang }}" type="text" placeholder="Satuan_barang...">
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection
