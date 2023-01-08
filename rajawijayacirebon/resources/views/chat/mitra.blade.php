@extends('layouts.admin')

@section("content")

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Chat {{ $mitra->nama }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin_chat">Chat</a></li>
            <li class="breadcrumb-item active"><a href="#">{{ $mitra->nama }}</a></li>
          </ol>
        </div>
      </div>
      <!-- alert -->
      @if (session()->has('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
      @endif
      <!-- alert -->
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
              <a href="{{ url('mitra/chat') }}" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
              <a href="{{ url("mitra/chat/{$mitra->id}/send") }}" class="btn btn-sm btn-info"><i class="fas fa-comment"></i> Balas</a>
            </div>
            @else
            <div class="card-header">
              <a href="{{ url("chat/send") }}" class="btn btn-sm btn-info"><i class="fas fa-comment"></i> Balas</a>
            </div>
            @endif

            <div class="card-body">
              <table id="chat" class="table table-bordered table-striped my-table">
                <thead>
                  <tr>
                    {{-- <th>Pesan</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @if (count($chat_mitra) === 0)
                  <h5>Belum ada chat</h5>
                  @else
                  @foreach ($chat_mitra as $chat)
                  <tr>
                    <td class="d-flex justify-content-between align-items-center">
                      <div class="d-flex flex-column justify-content-between">
                        @if ($chat->id_admin === null)
                        <p class="text-info text-xs text-bold">(Oleh {{ $mitra->nama }})</p>
                        @else
                        <p class="text-info text-xs text-bold">(Oleh Admin)</p>
                        @endif
                        <p>{{ $chat->chat }}</p>
                        <p class="text-xs text-info">({{ humanTiming($chat->tanggal) }} yang lalu)</p>
                      </div>
                      <span>
                        @if ($chat->id_admin === $user->id)
                        <a href="{{ url("mitra/chat/{$chat->id_chat}/{$mitra->id}/delete") }}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data?')"> Hapus</a>
                        @elseif($chat->id_mitra === $user->id && $chat->id_admin === null)
                        <a href="{{ url("chat/{$chat->id_chat}/delete") }}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data?')"> Hapus</a>
                        @endif
                      </span>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section("footer")
<script>
  $(function () {
    // $("#chat").DataTable({
    //   "responsive": true,
    //   "autoWidth": false,
    // });
  });

</script>
@endsection
