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
                           {{-- <th>Tgl_po</th> --}}
                           <th>Suplier</th>
                           <th>Kode</th>
                           <th>Nama Barang</th>
                           <th>Satuan</th>
                           <th>Qty</th>
                           <th>Harga Satuan</th>
                           <th>Total</th>
                           <th>Aksi </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($pembelian as $post)
                        <tr>
                           <td>{{ $no++}}</td>
                           <td>{{ $post->no_po}}</td>
                           {{-- 00px">{{ $post->Tgl_po }}</td> --}}
                           <td>{{ $post->suplier_id }}</td>
                           <td>{{ $post->kode }}</td>
                           <td>{{ $post->nama_barang }}</td>
                           <td>{{ $post->satuan }}</td>
                           <td>{{ $post->qty}}</td>
                           <td>{{ rupiah($post->harga_satuan) }}</td>
                           <td>{{ totalHarga($post->harga_satuan, $post->qty) }} </td>

                           <td>
                              <a class="btn btn-primary btn-sm" href="/pembelians/{{ $post->id}}/edit">Edit</a>
                              <form method="POST" action="{{ url('pembelians', $post->id ) }}">
                                 @csrf
                                 @method('DELETE')
                                 <a class="btn btn-primary btn-sm" href="/pembelians/{{ $post->id}}">Hapus</a>
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
