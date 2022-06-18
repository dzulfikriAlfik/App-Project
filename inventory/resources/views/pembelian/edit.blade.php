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
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
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
                           <label for="supplier_id">Supplier <span class="text-red">*</span></label>
                           <select name="supplier_id" id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                              <option value="">-- Pilih Supplier --</option>
                              @foreach ($suppliers as $supplier)
                              @if (old('supplier_id', $pembelian->supplier_id) == $supplier->supplier_id)
                              <option value="{{ $supplier->supplier_id }}" selected>{{ $supplier->supplier_name }}</option>
                              @else
                              <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                              @endif
                              @endforeach
                           </select>
                           @error('supplier_id')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="produk_id">Produk <span class="text-red">*</span></label>
                           <input type="hidden" name="produk_id" id="produk_id" value="{{ $pembelian->produk_id }}">
                           <input type="text" class="form-control" placeholder="Produk" value="{{ $pembelian->produk->kode_barang }}" disabled>
                        </div>
                        {{-- ajax --}}
                        <div class="form-group">
                           <label for="nama_barang">Nama Barang</label>
                           <input type="text" name="nama_barang" id="nama_barang" value="{{ $pembelian->produk->nama_barang }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                           <label for="harga_satuan">Harga Satuan</label>
                           <input type="text" id="harga_satuan" value="{{ rupiah($pembelian->produk->harga_satuan) }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                           <label for="jumlah_barang">Stock Barang</label>
                           <input type="text" id="jumlah_barang" value="{{ $pembelian->produk->jumlah_barang }}" value="" class="form-control" disabled>
                        </div>
                        {{-- End ajax --}}
                        <div class="form-group">
                           <label for="qty">Quantity <span class="text-red">*</span></label>
                           <input type="text" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity" value="{{ old('qty', $pembelian->qty) }}">
                           @error('qty')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <!-- Button -->
                        <div class="form-group text-center">
                           <button type="submit" name="add" class="btn btn-success btn-flat"><i class="fas fa-paper-plane"></i> Save</button>
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

      if (parseInt(qty) > parseInt(jumlahBarang)) {
         e.preventDefault();
         commonJS.swalError("Quantity tidak boleh melebihi stock barang tersedia")
         return;
      }
   });

</script>
@endpush
