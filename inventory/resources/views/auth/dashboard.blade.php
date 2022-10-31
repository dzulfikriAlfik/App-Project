@extends("layouts.templates")

@section("content")
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
               <span class="info-box-icon bg-info elevation-1">
                  <i class="fas fa-store"></i>
               </span>
               <div class="info-box-content">
                  <span class="info-box-text">Suppliers</span>
                  <span class="info-box-number">
                     {{ $suppliers }}
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1">
                  <i class="fas fa-box"></i>
               </span>
               <div class="info-box-content">
                  <span class="info-box-text">Jumlah Barang</span>
                  <span class="info-box-number">{{ $products }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-success elevation-1">
                  <i class="fas fa-shopping-cart"></i>
               </span>
               <div class="info-box-content">
                  <span class="info-box-text">Pembelian</span>
                  <span class="info-box-number">{{ $pembelian }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-warning elevation-1">
                  <i class="fas fa-people-carry"></i>
               </span>
               <div class="info-box-content">
                  <span class="info-box-text">Penerimaan Barang</span>
                  <span class="info-box-number">{{ $produk_masuk }}</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
</section>
@endsection
