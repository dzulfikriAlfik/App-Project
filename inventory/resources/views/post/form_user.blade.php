//views/post/form_rcv_barang_masuk.blade.php
@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
   <h1>Buat Post Baru</h1>

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

   <form method="POST" action="{{ url('rcv_barang_masuks') }}">
      @csrf
      <input name="No_po" type="text" placeholder="No_po...">
      <input name="Tgl_po" type="text" placeholder="Tgl_po...">
      <input name="Nama_suplier" type="text" placeholder="Nama_suplier...">
      <input name="Tgl_rcv" type="text" placeholder="Tgl_rcv...">
      <input name="No_rcv" type="text" placeholder="No_rcv...">
      <input name="Kode" type="text" placeholder="Kode...">
      <input name="Nama_barang" type="text" placeholder="Nama_barang...">
      <input name="Qty_po" type="text" placeholder="Qty_po...">
      <input name="Qty_rcv" type="text" placeholder="Qty_rcv...">
      <input name="Satuan" type="text" placeholder="Satuan...">
      <input name="Keterangan" type="text" placeholder="Keterangan...">
      <button class="btn-blue">Submit</button>
   </form>
</div>
@endsection
