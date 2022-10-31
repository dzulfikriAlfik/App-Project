@extends("layouts.templates")

@push("custom-style")
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
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
               <li class="breadcrumb-item active">Pembelian</li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         @if (session()->has('success'))
         <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success! </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         @endif
      </div>
   </div>
</div>

<section class="content">

   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <h3 class="card-title">Data Barang</h3>
                  <a href="#" class="btn btn-warning btn-sm ml-auto">Kembali</a>&nbsp;
                  <a href="{{ route("pembelian.create") }}" class="btn btn-primary btn-sm">Tambah</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>No Po</th>
                           <th>Tanggal</th>
                           <th>Supplier</th>
                           <th>Kode</th>
                           <th>Nama Barang</th>
                           <th>Satuan</th>
                           <th>Qty Beli</th>
                           <th>Harga Satuan</th>
                           <th>Estimasi Total</th>
                           <th>Aksi </th>
                           {{-- <th>Terkirim</th>
                           <th>Sisa Kirim</th>
                            --}}
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($pembelian as $pemb)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td style="width:200px">{{ $pemb->no_po}}</td>
                           <td style="width:200px">{{ tanggal_format($pemb->tanggal_po) }}</td>
                           <td style="width:200px">{{ $pemb->supplier_name }}</td>
                           <td style="width:100px">{{ $pemb->kode_barang }}</td>
                           <td>{{ $pemb->nama_barang }}</td>
                           <td>{{ $pemb->satuan }}</td>
                           <td>{{ $pemb->qty_beli }}</td>
                           <td>{{ rupiah($pemb->harga_satuan) }}</td>
                           <td>{{ total_harga($pemb->harga_satuan, $pemb->qty_beli) }}</td>
                           <td>
                              <a class="btn btn-warning btn-sm" href="{{ route('pembelian.edit',$pemb->id) }}">Edit</a>
                              <form method="POST" class="d-inline" action="{{ route('pembelian.destroy', $pemb->id ) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini? semua data yang berelasi akan ikut terhapus!')">Hapus</button>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

@push("custom-script")
<!-- DataTables -->
<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
<!-- page script -->
<script>
   $(function () {
      $("#example1").DataTable({
         "responsive": true,
         "autoWidth": false,
         "ordering": true,
         "autoWidth": false,
         "responsive": true,
      });
      $('#example2').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
      });
   });

   // $(function () {
   //    Swal.fire({
   //       title: 'Sweet Alert',
   //       text: 'Berhasil diload',
   //       type: 'success',
   //       icon: 'success',
   //       showConfirmButton: false,
   //       timer: 2000,
   //       footer: '<b>Aplikasi Inventory</b>'
   //    });
   // })

</script>
@endpush
