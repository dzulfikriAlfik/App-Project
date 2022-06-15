//views/post/edit_rcv_barang.blade.php
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
  
  <form method="POST" action="{{ url('rcv_barang_masuks', $post->id ) }}">
    @csrf
    @method('PUT')
    <input name="No_po" value="{{ $post->No_po }}" type="text" placeholder="No_po..."> 
    <input name="Tgl_po" value="{{ $post->Tgl_po }}" type="text" placeholder="Tgl_po..."> 
    <input name="Nama_suplier" value="{{ $post->Nama_suplier }}" type="text" placeholder="Nama_suplier..."> 
    <input name="Tgl_rcv" value="{{ $post->Tgl_rcv }}" type="text" placeholder="Tgl_rcv..."> 
    <input name="No_rcv" value="{{ $post->No_rcv }}" type="text" placeholder="No_rcv..."> 
    <input name="Kode" value="{{ $post->Kode }}" type="text" placeholder="Kode..."> 
    <input name="Nama_barang" value="{{ $post->Nama_barang }}" type="text" placeholder="Nama_barang..."> 
    <input name="Qty_po" value="{{ $post->Qty_po }}" type="text" placeholder="Qty_po..."> 
    <input name="Qty_rcv" value="{{ $post->Qty_rcv }}" type="text" placeholder="Qty_rcv..."> 
    <input name="Satuan" value="{{ $post->Satuan }}" type="text" placeholder="Satuan..."> 
    <input name="Keterangan" value="{{ $post->Keterangan }}" type="text" placeholder="Keterangan..."> 
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection
