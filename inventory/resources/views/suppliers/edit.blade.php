@extends("layouts.templates")

@section("content")
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Suppliers</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Edit Data Suppliers</li>
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
               <a href="{{ route("suppliers.index") }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="{{ route('suppliers.update', $supplier->supplier_id) }}" method="post">
                  @method('put')
                  @csrf
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        {{-- <input type="hidden" name="item_id" value=""> --}}
                        <div class="form-group">
                           <label for="supplier_name">Nama Supplier <span class="text-red">*</span></label>
                           <input type="text" name="supplier_name" id="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" placeholder="Nama Supplier" value="{{ old('supplier_name', $supplier->supplier_name) }}">
                           @error('supplier_name')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="supplier_phone">No. Telp <span class="text-red">*</span></label>
                           <input type="text" name="supplier_phone" id="supplier_phone" class="form-control @error('supplier_phone') is-invalid @enderror" placeholder="No. Telp" value="{{ old('supplier_phone', $supplier->supplier_phone) }}">
                           @error('supplier_phone')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="supplier_address">Alamat <span class="text-red">*</span></label>
                           <textarea name="supplier_address" class="form-control @error('supplier_address') is-invalid @enderror" id="supplier_address" cols="30" rows="5">{{ $supplier->supplier_address }}</textarea>
                           @error('supplier_address')
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
