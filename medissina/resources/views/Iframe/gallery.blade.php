@extends('_layouts.iframe')

@section('content')
<h4 id="default">Galeri Kegiatan</h4>

<div class="example" style="margin-top: 40px">
  <div id="content"></div>
</div>
@endsection

@section("jquery")
<script>
  let placeHolderImage = `${baseUrl}/assets/images/placeholder.jpg`;

  commonAPI.getAPI(`${baseUrl}/api/gallery/get`, (response) => {
    if (response.data == null) {
      $("#content").html(`
      <div class="container">
        <p class="text-center">Belum ada data kegiatan</p>
      </div>
      `);
    } else {
      $("#content").append(`<div class="row" id="row"></div>`);

      const responseData = response.data;

      for (let index in responseData) {
        const data = responseData[index];

        $("#row").append(`
        <div class="col-12 col-md-6 col-xl-4" style="padding: 1rem">
          <div class="card">
            <img src="{{ url('assets/images/placeholder.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">${data.title}</h5>
              <p class="card-text">${data.description}</p>
              <br/>
              <a href="#" class="btn btn-primary">Lihat detail</a>
            </div>
          </div>
        </div>
        `);
      }
    }
  })

</script>
@endsection
