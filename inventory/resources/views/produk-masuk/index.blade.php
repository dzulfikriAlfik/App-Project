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
            <h1 class="m-0">Produk Masuk</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Produk Masuk</li>
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
                  <h3 class="card-title">Produk Masuk</h3>
                  <a href="{{ route("produk-masuk.create") }}" class="btn btn-primary btn-sm ml-auto">Tambah</a>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>No. PO</th>
                           <th>Nama Barang</th>
                           <th>Qty Order</th>
                           <th>Qty Diterima</th>
                           <th>Tanggal Diterima</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($produk_masuk as $produk)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $produk->pembelian->no_po}}</td>
                           <td>{{ $produk->pembelian->nama_barang }}</td>
                           <td>{{ $produk->pembelian->qty_beli }}</td>
                           <td>{{ $produk->qty_terima }}</td>
                           <td>{{ tanggal_format($produk->tanggal_masuk) }}</td>
                           <td>{{ $produk->keterangan }}</td>
                           <td>
                              <a href="{{ route('produk-masuk.show',$produk->id) }}" class="btn btn-sm btn-info">Detail</a>
                              <form method="POST" action="{{ route('produk-masuk.destroy', $produk->id) }}" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button onclick="return confirm('Yakin ingin hapus data ini? ini akan menghapus semua data yang berelasi!')" class="btn btn-sm btn-danger">Hapus</button>
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
