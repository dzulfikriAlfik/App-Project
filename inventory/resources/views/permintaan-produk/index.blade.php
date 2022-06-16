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
            <h1 class="m-0">Permintaan Produk</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Permintaan Produk</li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">

   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <h3 class="card-title">Permintaan Produk</h3>
                  <a href="{{ route("permintaan-produk.create") }}" class="btn btn-primary btn-sm ml-auto">Tambah</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Kode</th>
                           <th>Nama Barang</th>
                           <th>Harga</th>
                           <th>Jumlah Barang</th>
                           <th>Aksi </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($permintaan_produk as $post)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $post->kode_barang}}</td>
                           <td>{{ $post->nama_barang }}</td>
                           <td>{{ $post->harga_barang }}</td>
                           <td>{{ $post->jumlah_barang }}</td>
                           <td>
                              <a href="#">
                                 <button class="btn btn-warning">Edit</button>
                              </a>
                              <form method="POST" action="#">
                                 @csrf
                                 @method('DELETE')
                                 <a href="#"><button class="btn btn-danger">Hapus</button>
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

</script>
@endpush
