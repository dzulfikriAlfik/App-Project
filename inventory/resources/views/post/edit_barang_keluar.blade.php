//views/post/edit_barang_keluar.blade.php
@extends('layouts.app')
@section('title', 'barang_keluar Edit')
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
  
  <form method="POST" action="{{ url('barang_keluars', $post->id ) }}">
    @csrf
    @method('PUT')
    <input name="No_bon" value="{{ $post->No_po }}" type="text" placeholder="No_bon..."> 
    <input name="Tgl" value="{{ $post->Tgl }}" type="text" placeholder="Tgl...">
    <input name="Kode_barang" value="{{ $post->Kode_barang }}" type="text" placeholder="Kode_barang...">
    <input name="Nama_barang" value="{{ $post->Nama_barang }}" type="text" placeholder="Nama_barang...">
    <input name="Satuan" value="{{ $post->Satuan }}" type="text" placeholder="Satuan...">
    <input name="Qty" value="{{ $post->Qty }}" type="text" placeholder="Qty...">
    <input name="Keterangan" value="{{ $post->Keterangan }}" type="text" placeholder="Keterangan...">
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection
