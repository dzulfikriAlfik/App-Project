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
            <h1 class="m-0">Pembelian</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Edit Data Pembelian</li>
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
            <strong>Error! </strong>{{ session('error') }}
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
               <a href="{{ route("pembelian.index") }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="{{ route('pembelian.update', $pembelian->id) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="row d-flex justify-content-around">
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="no_po">No. PO <span class="text-red">*</span></label>
                           <input type="text" name="no_po" id="no_po" class="form-control @error('no_po') is-invalid @enderror" placeholder="No. PO" value="{{ old('no_po', $pembelian->no_po) }}">
                           @error('no_po')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label>Tanggal PO</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal_po" value="{{ old('tanggal_po', $pembelian->tanggal_po) }}" class="form-control datetimepicker-input @error('tanggal_po') is-invalid @enderror" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                              @error('tanggal_po')
                              <small class="invalid-feedback">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="supplier_name">Supplier <span class="text-red">*</span></label>
                           <select name="supplier_name" id="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror">
                              <option value="">-- Pilih Supplier --</option>
                              @foreach ($suppliers as $supplier)
                              @if (old('supplier_name', $pembelian->supplier_name) == $supplier->supplier_name)
                              <option value="{{ $supplier->supplier_name }}" selected>{{ $supplier->supplier_name }}</option>
                              @else
                              <option value="{{ $supplier->supplier_name }}">{{ $supplier->supplier_name }}</option>
                              @endif
                              @endforeach
                           </select>
                           @error('supplier_name')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="kode_barang">Kode Barang <span class="text-red">*</span></label>
                           <input type="text" name="kode_barang" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Kode Barang" value="{{ old('kode_barang', $pembelian->kode_barang) }}">
                           @error('kode_barang')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="nama_barang">Nama Barang <span class="text-red">*</span></label>
                           <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang" value="{{ old('nama_barang', $pembelian->nama_barang) }}">
                           @error('nama_barang')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="satuan">Satuan <span class="text-red">*</span></label>
                           <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" placeholder="Satuan" value="{{ old('satuan', $pembelian->satuan) }}">
                           @error('satuan')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="qty_beli">Quantity Beli <span class="text-red">*</span></label>
                           <input type="text" name="qty_beli" id="qty_beli" class="form-control @error('qty_beli') is-invalid @enderror" placeholder="Quantity Beli" value="{{ old('qty_beli', $pembelian->qty_beli) }}">
                           @error('qty_beli')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="harga_satuan">Harga Satuan <span class="text-red">*</span></label>
                           <input type="text" name="harga_satuan" id="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" placeholder="Harga Satuan" value="{{ old('harga_satuan', $pembelian->harga_satuan) }}">
                           @error('harga_satuan')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <!-- Button -->
                        <div class="form-group text-center">
                           <button type="submit" id="button-add" class="btn btn-success btn-flat"><i class="fas fa-paper-plane"></i> Save</button>
                           <button type="reset" class="btn btn-dark btn-flat"><i class="fas fa-backward"></i> Reset</button>
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

@push("custom-script")
{{-- Moment Js --}}
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
   //Date picker
   $('#reservationdate').datetimepicker({
      format: "Y-MM-DD",
      useCurrent: false,
      defaultDate: new Date(),
   });

   $("#button-add").on("click", function (e) {
      let qty = $("#qty").val();
      let jumlahBarang = $("#jumlah_barang").val();
      let qtyTerkirim = $("#qty_terkirim").val();

      if (qty < qtyTerkirim) {
         e.preventDefault();
         commonJS.swalError("Quantity tidak boleh kurang dari quantity yang sudah terkirim")
         return;
      }

      if (parseInt(qty) > parseInt(jumlahBarang)) {
         e.preventDefault();
         commonJS.swalError("Quantity tidak boleh melebihi stock barang tersedia")
         return;
      }
   });

</script>
@endpush
