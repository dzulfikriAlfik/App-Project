
@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
  <h1>Buat Post Baru</h1>
  <a href="{{ route('posts.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>

  
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
  
  
  <form method="POST" action="{{ url('posts') }}">
    @csrf
  
    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
    <table style="border:0px">
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="No_Penerimaan">No_penerimaan</label>
        </td>
        <td style="border:none">
          <input name="No_Penerimaan" type="text" placeholder="No_Penerimaan...">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Kode">Kode</label>
        </td>
        <td style="border:none">
          <input name="Kode" type="text" placeholder="Kode...">
          <!-- onkeypress="return hanyaAngka(event)"> -->
        </td>
      </tr>
      <tr>
        <td style="text-align:left; border:none; width: 200px;">
          <label for="Suplier">Suplier</label>
        </td>
        <td style="border:none">
          <input name="Suplier" type="text" placeholder="Suplier...">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Nama_Barang">Barang</label>
        </td>
        <td style="border:none">
          <input name="Nama_Barang" type="text" placeholder="Nama_Barang...">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Satuan">Satuan</label>
        </td>
        <td style="border:none">
          <input name="Satuan" type="text" placeholder="Satuan...">
        </td>
      </tr>
      
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Qty_Po">Qty_Po</label>
        </td>
        <td style="border:none">
          <input name="Qty_Po" type="text" placeholder="Qty_Po...">
        </td>
      </tr>

      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Qty_Penerimaan">Qty_Penerimaan</label>
        </td>
        <td style="border:none">
          <input name="Qty_Penerimaan" type="text" placeholder="Qty_Penerimaan...">
        </td>
      </tr>
     
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Keterangan">Keterangan</label>
        </td>
        <td style="border:none">
          <input name="Keterangan" type="text" placeholder="Keterangan...">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="No_po">No_po</label>
        </td>
        <td style="border:none; text-align:left;">
          <select name="No_po" id="No_po"class="form-control" style="height:30px; width: 185px;">
            <option value="none">Pilih po</option>
          </select>
        </td>
      </tr>

     
      </table>
    <button class="btn-blue">Submit</button>
  </form>
</div> 
























 <!--   
    <label for="No_Penerimaan">No_Peneriman</label>
    <input name="No_Penerimaan" type="text" placeholder="No_Penerimaan..."><br><br>
    <label for="Kode">Kode</label>
    <input name="Kode" type="text" placeholder="Kode..."><br><br>
    <label for="Suplier">Suplier</label>
    <input name="Suplier" type="text" placeholder="Suplier..."><br><br>
    <label for="Nama_Barang">Nama_Barang</label>
    <input name="Nama_Barang" type="text" placeholder="Nama_Barang..."><br><br>
    <label for="Satuan">Satuan</label>
    <input name="Satuan" type="text" placeholder="Satuan..."><br><br>
    <label for="Qty_Po">Qty_Po</label>
    <input name="Qty_Po" type="text" placeholder="Qty_Po..."><br><br>
    <label for="Qty_Penerimaan">Qty_Penerimaan</label>
    <input name="Qty_Penerimaan" type="text" placeholder="Qty_Penerimaan..."><br><br>
    <label for="Keterangan">Keterangan</label>
    <input name="Keterangan" type="text" placeholder="Keterangan..."><br><br>
    <button class="btn-blue">Submit</button><br><br>


  </form>
</div>
@endsection
