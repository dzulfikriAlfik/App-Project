@extends("layouts.templates")

@push('custom-style')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@section("content")
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Barang Masuk</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Edit Data Barang Masuk</li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         @if (session()->has('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success! </strong>{{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         @endif
      </div>
   </div>
</div>

<section class="content">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <a href="{{ route("produk-masuk.index") }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="{{ route('produk-masuk.store') }}" method="post">
                  @csrf
                  <div class="row d-flex justify-content-around">
                     <div class="col-md-5">
                        <div class="form-group">
                           <label>Tanggal Terima</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal_masuk" value="{{ tanggal_format($produk_masuk->tanggal_masuk) }}" class="form-control datetimepicker-input @error('tanggal_masuk') is-invalid @enderror" data-target="#reservationdate" disabled />
                              @error('tanggal_masuk')
                              <small class="invalid-feedback">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="pembelian_id">No. PO</label>
                           <input type="hidden" name="pembelian_id" id="pembelian_id" value="{{ $produk_masuk->pembelian_id }}" class="form-control" disabled>
                           <input type="text" value="{{ $pembelian->no_po }}" class="form-control" disabled>
                        </div>
                        {{-- ajax --}}
                        <div class="form-group">
                           <label for="qty_pembelian">Quantity Order</label>
                           <input type="text" name="qty_pembelian" id="qty_pembelian" value="{{ $pembelian->qty_beli }}" class="form-control" disabled>
                        </div>
                        {{-- End ajax --}}
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="nama_barang">Nama Barang</label>
                           <input type="text" name="nama_barang" id="nama_barang" value="{{ $pembelian->nama_barang }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                           <label for="qty_terima">Quantity Diterima</label>
                           <input type="number" name="qty_terima" id="qty_terima" class="form-control" placeholder="Masukkan Quantity yang akan dikirim" disabled value="{{ $produk_masuk->qty_terima }}">
                        </div>
                        <div class="form-group">
                           <label for="keterangan" id="info">Keterangan</label>
                           <input type="text" disabled name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Quantity yang akan dikirim" value="{{ $produk_masuk->keterangan }}">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>
@endsection
