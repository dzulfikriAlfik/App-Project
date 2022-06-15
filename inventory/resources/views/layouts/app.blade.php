<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>@yield('title')</title>
   <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body>
   <div class="container">
      @yield('content')
   </div>
</body>
<!-- <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function () {
      console.log('tes');
      // list_product();
   });

   function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

         return false;
      return true;
   }

   function calculate() {
      Qty = $('[name=Qty]').val();
      Price = $('[name=Harga_Satuan]').val();
      var Total = 0;
      Total = Qty * Price;
      $('[name=Jumlah_Total]').val(Total);
   }

</script>

</html>
