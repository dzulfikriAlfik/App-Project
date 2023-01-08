@extends('layouts.admin')

@section("content")
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Balas Chat Mitra {{ $mitra->nama }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="daftar_mitra_chat">Chat</a></li>
            <li class="breadcrumb-item active"><a href="#">Balas Chat {{ $mitra->nama }}</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">

            @if ($user->role === "admin")
            <div class="card-header">
              <a href="{{ url("mitra/chat/{$mitra->id}") }}" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            @else
            <div class="card-header">
              <a href="{{ url("chat") }}" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            @endif

            <div class="card-body">
              <form action="{{ $user->role === "admin" ? url("mitra/chat/{$mitra->id}/send") : url("chat/send") }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="chat">Masukan isi pesan</label>
                  <textarea class="form-control col-md-12 mb-3" name="chat" id="chat" rows="5"></textarea>

                  <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Kirim</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
