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
               <li class="breadcrumb-item active">Tambah Data Barang Masuk</li>
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
                           <label>Tanggal Masuk</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="form-control datetimepicker-input @error('tanggal_masuk') is-invalid @enderror" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                              @error('tanggal_masuk')
                              <small class="invalid-feedback">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="pembelian_id">No. PO <span class="text-red">*</span></label>
                           <select name="pembelian_id" id="pembelian_id" class="form-control @error('pembelian_id') is-invalid @enderror">
                              <option value="">-- Pilih No. PO --</option>
                              @foreach ($pembelian as $pemb)
                              @if ($pemb->qty_sisa > 0)
                              @if (old('pembelian_id') == $pemb->id)
                              <option value="{{ $pemb->id }}" selected>{{ $pemb->no_po }}</option>
                              @else
                              <option value="{{ $pemb->id }}">{{ $pemb->no_po }}</option>
                              @endif
                              @endif
                              @endforeach
                           </select>
                           @error('pembelian_id')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        {{-- ajax --}}
                        <div class="form-group">
                           <label for="nama_barang">Nama Barang</label>
                           <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                           <label for="qty_pembelian">Quantity Order</label>
                           <input type="text" name="qty_pembelian" id="qty_pembelian" value="{{ old('qty_pembelian') }}" class="form-control" disabled>
                        </div>
                        {{-- End ajax --}}
                     </div>
                     <div class="col-md-5">
                        <div class="form-group">
                           <label for="qty_belum_kirim">Belum dikirim</label>
                           <input type="text" name="qty_belum_kirim" id="qty_belum_kirim" value="{{ old('qty_belum_kirim') }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                           <label for="qty_terima">Quantity Diterima <span class="text-red">*</span></label>
                           <input type="number" name="qty_terima" id="qty_terima" class="form-control @error('qty_terima') is-invalid @enderror" placeholder="Masukkan Quantity yang akan dikirim" value="{{ old('qty_terima', 1) }}">
                           @error('qty_terima')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="qty_sisa">Estimasi Sisa</label>
                           <input type="text" name="qty_sisa" id="qty_sisa" placeholder="Quantity Sisa" class="form-control @error('qty_sisa') is-invalid @enderror" disabled>
                           @error('qty_sisa')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group" id="keteranganHtml">
                           <label for="keterangan">Keterangan <span class="text-red">*</span></label>
                           <select name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                              <option value="">-- Pilih Keterangan --</option>
                              <option value="Sisa akan dikirim pada penerimaan berikutnya">Sisa akan dikirim pada penerimaan berikutnya</option>
                              <option value="Qty order telah terpenuhi">Qty order telah terpenuhi</option>
                              <option value="Stock supplier tidak memenuhi Qty Order">Stock supplier tidak memenuhi Qty Order</option>
                           </select>
                           @error('keterangan')
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
      let pembelian_id = $("#pembelian_id").val()
      if (pembelian_id) {
         getListPembelian();
      }
   });

   //Date picker
   $('#reservationdate').datetimepicker({
      format: "Y-MM-DD",
      useCurrent: false,
      defaultDate: new Date(),
   });

   $("#button-add").on("click", function (e) {
      if ($("#pembelian_id").val() == "") {
         e.preventDefault();
         commonJS.swalError("No. PO tidak boleh kosong");
      }
   });

   function getListPembelian() {
      let pembelian_id = $("#pembelian_id").val()
      $.ajax({
            url: `/list_pembelian/${pembelian_id}`,
            method: "GET",
            dataType: "json",
         })
         .done(function (response) {
            data = response.data;
            $("#qty_pembelian").val(parseInt(data.qty_beli))
            $("#qty_belum_kirim").val(data.qty_sisa)
            $("#nama_barang").val(data.nama_barang)

            calculateSisa();
            checkSisa();

            $("#qty_terima").on("change keyup", function () {
               calculateSisa();
               checkSisa();
            });
         });
   }

   $("#pembelian_id").on("change", function () {
      getListPembelian();
   });

   function calculateSisa() {
      let qtyPembelian = $("#qty_belum_kirim").val();
      let qtyKirim = $("#qty_terima").val();
      let qtySisa = parseInt(qtyPembelian) - parseInt(qtyKirim);
      $("#qty_sisa").val(qtySisa);
   }

   function checkSisa() {
      let qtyPembelian = $("#qty_belum_kirim").val();
      let qtyKirim = $("#qty_terima").val();
      let qtySisa = parseInt(qtyPembelian) - parseInt(qtyKirim);
      if (qtyKirim < 1) {
         $("#qty_terima").val(1);
         calculateSisa()
      } else if (parseInt(qtyKirim) > parseInt(qtyPembelian)) {
         $("#qty_terima").val(parseInt(qtyPembelian));
         calculateSisa();
      }

      if (qtySisa == 0) {
         $("#keterangan").attr("readonly", true);
         $("#keterangan option[value='Qty order telah terpenuhi']").prop("selected", true)
      } else {
         $("#keterangan").val("");
         $("#keterangan").attr("readonly", false);
      }
   }

</script>
@endpush
