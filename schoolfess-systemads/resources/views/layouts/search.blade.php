<div class="row justify-content-md-center filter">
    {{-- End Search --}}
    <div class="col col-lg-9 mb-3">
        <div class="col-md-auto">
            <div class="form-label-group mb-0">
                <input id="filterJudul" type="text" class="form-control" placeholder="Search">
                <label for="filterJudul">Cari Dokumen</label>
            </div>
        </div>
    </div>
    {{-- Filter --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-6 justify-content-md-center">
        <div class="col col-lg-3 mb-2">
            <div class="form-select-wrapper">
            <select class="form-select" id="filterTipeDokumen" aria-label="Default select example">
                <option value="" selected>Semua Tipe Dokumen</option>
                {{-- <option value="Peraturan Perundang-undangan">Peraturan Perundang-undangan</option>
                <option value="Monografi Hukum">Monografi Hukum</option>
                <option value="Artikel Hukum">Artikel Hukum</option>
                <option value="Putusan Hukum">Putusan Hukum</option>
                <option value="Lainnya">Lainnya</option> --}}
            </select>
            </div>
        </div>
        <div class="col col-lg-3 mb-2">
            <div class="form-select-wrapper">
            <select class="form-select" id="filterJenisPeraturan" aria-label="Default select example">
                <option value="" selected>Semua Jenis Peraturan</option>
                {{-- <option value="Peraturan Daerah">Peraturan Daerah</option>
                <option value="Peraturan Gubernur">Peraturan Gubernur</option>
                <option value="Peraturan Bersama Gubernur">Peraturan Bersama Gubernur</option>
                <option value="Peraturan DPRD">Peraturan DPRD</option> --}}
            </select>
            </div>
        </div>
        <div class="col col-lg-3">
            <div class="form-label-group mb-4">
                <input id="filterNomorDokumen" type="text" class="form-control" placeholder="Text Input">
                <label for="filterNomorDokumen">Nomor Dokumen</label>
            </div>
        </div>
        <div class="col col-lg-3">
            <div class="form-select-wrapper">
            <select class="form-select" id="filterTahun" aria-label="Default select example">
            </select>
            </div>
        </div>
    </div>
    {{-- Button --}}
    <div class="row justify-content-center">
    <div class="col col-lg-3 mt-2">
        <button class="btn btn-sm btn-secondary rounded" data-bs-toggle="modal" data-bs-target="#modal-01" style="width: 100%;" onclick="clearFilter()">Clear</button>
    </div>
    <div class="col col-lg-3 mt-2">
        <button class="btn btn-sm btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modal-01" style="width: 100%;" onclick="buttonSearch()">Cari</button>
    </div>
    </div>
    {{-- End Button --}}
    {{-- End Filter --}}
</div>

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/search.js') }}"></script>
@endsection