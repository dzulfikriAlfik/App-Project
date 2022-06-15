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
  <a href="{{ route('posts.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>

  
  <form method="POST" action="{{ url('posts', $post->id ) }}">
    @csrf
    @method('PUT')
    <p>
    <label>No_penerimaan:</label>
    <input name="No_Penerimaan" value="{{ $post->No_Penerimaan }}" type="text" placeholder="No_Penerimaan..."> <br><br>
    </p>
    <p>
    <label>Kode:</label>
    <input name="Kode" value="{{ $post->Kode }}" type="text" placeholder="Kode..."><br><br>
    </p>
    <p>
    <label>Suplier:</label>
    <input name="Suplier" value="{{ $post->Suplier }}" type="text" placeholder="Suplier..."> <br><br>
    </p>
    <p>
    <label>Nama_Barang:</label>
    <input name="Nama_Barang" value="{{ $post->Nama_Barang }}" type="text" placeholder="Nama_Barang..."><br><br> 
    </p>
    <p>
    <label>Satuan:</label>
    <input name="Satuan" value="{{ $post->Satuan }}" type="text" placeholder="Satuan..."> <br><br>
    </p>
    <p>
    <label>Qty_Po:</label>
    <input name="Qty_Po" value="{{ $post->Qty_Po }}" type="text" placeholder="Qty..."> <br><br>
    </p>
    <p>
    <label>Qty:</label>
    <input name="Qty_Penerimaan" value="{{ $post->Qty_Penerimaan }}" type="text" placeholder="Qty_Penerimaan..."> <br><br>
    </p>
    <p>
    <label>Keterangan:</label>
    <input name="Keterangan" value="{{ $post->Keterangan }}" type="text" placeholder="Keterangan..."> <br><br>
    </p>
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection
