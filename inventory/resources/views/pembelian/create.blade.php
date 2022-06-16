@extends("layouts.templates")

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
               <li class="breadcrumb-item active">Tambah Data Pembelian</li>
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
               <form action="#" method="post">
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <input type="hidden" name="item_id" value="">
                        <div class="form-group">
                           <label for="no_po">No PO <span class="text-red">*</span></label>
                           <input type="text" name="no_po" id="no_po" class="form-control" placeholder="No Po" value="" required="">
                        </div>
                        <div class="form-group">
                           <label for="supplier">Product Name <span class="text-red">*</span></label>
                           <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Product Name" value="" required="">
                        </div>
                        <div class="form-group">
                           <label for="category">Category <span class="text-red">*</span></label>
                           <select name="category" id="category" class="form-control" required="">
                              <option value="">-- Pilih Kategori --</option>
                              <option value="6">Makanan</option>
                              <option value="7">Minuman</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="unit">Unit <span class="text-red">*</span></label>
                           <select name="unit" class="form-control" required="required">
                              <option value="" selected="selected">-- Pilih Unit --</option>
                              <option value="3">Buah</option>
                              <option value="4">Kilogram</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="price">Price <span class="text-red">*</span></label>
                           <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="" required="">
                        </div>
                        <div class="form-group">
                           <label for="image">Image</label>

                           <input type="file" name="image" id="image" class="form-control" placeholder="Image" value="">
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
