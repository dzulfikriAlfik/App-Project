@extends('_layouts/home')

@section("custom-header")
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }

</script>
@endsection

@section('content')
<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
  <iframe src="{{ url('/iframe-gallery') }}" width="100%" allowtransparency="true" style="height:100vh" scrolling="no" frameborder="0" onload="resizeIframe(this)" allowfullscreen="true">
  </iframe>
</main>
@endsection
