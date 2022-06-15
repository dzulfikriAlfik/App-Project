@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
  <h1>Buat Post Baru</h1>
  
  <a href="{{ route('pengeluarans.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>
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

  <form method="POST" action="{{ url('pengeluarans') }}">
    @csrf
    


    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
    <table style="border:0px">
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Nama_Toko">Nama_Toko</label>
        </td>
        <td style="border:none">
          <input name="Nama_Toko" type="text" placeholder="Nama_Toko...">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="No_Surat_jalan">No_Surat_jalan</label>
        </td>
        <td style="border:none">
          <input name="No_Surat_jalan" type="text" placeholder="No_Surat_jalan..." onkeypress="return hanyaAngka(event)">
        </td>
      </tr>
      <tr>
        <td style="text-align:left; border:none; width: 200px;">
          <label for="Alamat_Toko">Alamat_Toko</label>
        </td>
        <td style="border:none">
          <input name="Alamat_Toko" type="text" placeholder="Alamat_Toko...">
        </td>
      </tr>


      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Nama_Barang">Nama_Barang</label>
        </td>
        <td style="border:none; text-align:left;">
          <select name="Nama_Barang", id="Nama_Barang" class="form-control" style="height:30px; width: 185px;">
            <option value="none">Pilih Barang</option>
          </select>
        </td>
      </tr>
      <tr>
        <td style="text-align:left; align-item:center;border:none; width: 200px;">
          <label for="Qty">Qty</label>
        </td>
        <td style="border:none">
          <input name="Qty" type="text" placeholder="Qty..." onkeypress="return hanyaAngka(event)"  onchange="calculate()">
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
          <label for="Harga_Satuan">Harga_Satuan</label>
        </td>
        <td style="border:none">
          <input name="Harga_Satuan" type="text" placeholder="Harga_Satuan..." onkeypress="return hanyaAngka(event)" onchange="calculate()">
        </td>
      </tr>
      <tr>
        <td style="text-align:left;border:none; width: 200px;">
          <label for="Jumlah_Total">Jumlah_Total</label>
        </td>
        <td style="border:none">
          <input name="Jumlah_Total" type="text" placeholder="Jumlah_Total..." readonly>
        </td>
      </tr>
    </table>
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection