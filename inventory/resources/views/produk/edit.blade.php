@extends("layouts.templates")

@section("content")
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Produk</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
               <li class="breadcrumb-item active">Edit Data Barang</li>
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
               <a href="{{ route("produks.index") }}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="{{ route('produks.update', $produk->id) }}" method="post">
                  @method('put')
                  @csrf
                  <div class="row d-flex justify-content-center">
                     <div class="col-md-5 mx-auto">
                        <div class="form-group">
                           <label for="nama_barang">Nama Barang <span class="text-red">*</span></label>
                           <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang" value="{{ old('nama_barang', $produk->nama_barang) }}">
                           @error('nama_barang')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="kode_barang">Kode Barang <span class="text-red">*</span></label>
                           <input type="text" name="kode_barang" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Kode Barang" value="{{ old('kode_barang', $produk->kode_barang) }}">
                           @error('kode_barang')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="satuan">Satuan <span class="text-red">*</span></label>
                           <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" placeholder="Satuan" value="{{ old('satuan', $produk->satuan) }}">
                           @error('satuan')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="harga_satuan">Harga Satuan <span class="text-red">*</span></label>
                           <input type="text" name="harga_satuan" id="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" placeholder="Harga Satuan" value="{{ old('harga_satuan', $produk->harga_satuan) }}">
                           @error('harga_satuan')
                           <small class="invalid-feedback">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="jumlah_barang">Jumlah Barang <span class="text-red">*</span></label>
                           <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror" placeholder="Jumlah Barang" value="{{ old('jumlah_barang', $produk->jumlah_barang) }}">
                           @error('jumlah_barang')
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
