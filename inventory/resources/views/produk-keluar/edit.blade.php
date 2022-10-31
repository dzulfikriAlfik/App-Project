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
            <h1 class="m-0">Barang Keluar</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Edit Data Barang Keluar</li>
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
               <a href="{{ route("produk-keluar.index") }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="{{ route('produk-keluar.store') }}" method="post">
                  @csrf
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <div class="form-group">
                           <label>Tanggal Keluar</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal_keluar" value="{{ old('tanggal_keluar',$produk_keluar->tanggal_keluar) }}" class="form-control datetimepicker-input @error('tanggal_keluar') is-invalid @enderror" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                              @error('tanggal_keluar')
                              <small class="invalid-feedback">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="produk_id">Produk</label>
                           <input type="hidden" name="produk_id" id="produk_id" value="{{ $produk->id }}" class="form-control" disabled>
                           <input type="text" name="no_po" id="no_po" value="{{ $produk->kode_barang }}" class="form-control" disabled>
                           @error('no_po')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        {{-- ajax --}}
                        <div class="form-group">
                           <label for="jumlah_barang">Stok Barang</label>
                           <input type="text" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang') }}" class="form-control" disabled>
                        </div>
                        {{-- End ajax --}}
                        <div class="form-group">
                           <label for="qty_kirim">Quantity Keluar <span class="text-red">*</span></label>
                           <input type="text" name="qty_kirim" id="qty_kirim" class="form-control @error('qty_kirim') is-invalid @enderror" placeholder="Masukkan Quantity yang akan dikirim" value="{{ old('qty_kirim', 1) }}">
                           @error('qty_kirim')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="qty_sisa">Quantity Sisa</label>
                           <input type="text" name="qty_sisa" id="qty_sisa" value="" placeholder="Quantity Sisa" class="form-control @error('qty_sisa') is-invalid @enderror" disabled>
                           @error('qty_sisa')
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
   // on ready function
   $(function () {
      let produk_id = $("#produk_id").val();
      if (produk_id) {
         getListProduk();
      }
   });

   //Date picker
   $('#reservationdate').datetimepicker({
      format: "Y-MM-DD",
      useCurrent: false,
      defaultDate: new Date(),
   });

   $("#button-add").on("click", function (e) {
      if ($("#produk_id").val() == "") {
         e.preventDefault();
         commonJS.swalError("Produk tidak boleh kosong");
      }
   });

   function getListProduk() {
      let produk_id = $("#produk_id").val()
      $.ajax({
            url: `/list_produk/${produk_id}`,
            method: "GET",
            dataType: "json",
         })
         .done(function (response) {
            data = response.data;
            $("#jumlah_barang").val(data.jumlah_barang)

            calculateSisa();
            checkSisa();

            $("#qty_kirim").on("change keyup", function () {
               calculateSisa();
               checkSisa();
            });


         });
   }

   $("#produk_id").on("change", function () {
      getListProduk();
   });

   function calculateSisa() {
      let qtyPembelian = $("#jumlah_barang").val();
      let qtyKirim = $("#qty_kirim").val();
      let qtySisa = parseInt(qtyPembelian) - parseInt(qtyKirim);
      $("#qty_sisa").val(qtySisa);
   }

   function checkSisa() {
      let qtyPembelian = $("#jumlah_barang").val();
      let qtyKirim = $("#qty_kirim").val();
      let qtySisa = parseInt(qtyPembelian) - parseInt(qtyKirim);
      if (qtyKirim < 1) {
         $("#qty_kirim").val(1);
         calculateSisa()
      } else if (parseInt(qtyKirim) > parseInt(qtyPembelian)) {
         $("#qty_kirim").val(parseInt(qtyPembelian));
         calculateSisa();
      }
   }

</script>
@endpush
