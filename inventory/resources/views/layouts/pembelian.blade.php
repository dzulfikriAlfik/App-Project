<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/pembelian.css') }}"/>
</head>
<body>
  <div class="container">
      @yield('content')
  </div>
</body>
<!--
  ini tidak pungsi semua
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script>
//$(document).ready(function () {
    // console.log('tes');
   // list_product();
//});
//function list_product(){
  //  let item = '';
    //$.ajax({
      //  url: "/pembelian/list_product",
        //type: "POST",
        //data: {
          //  _token: $("#csrf").val(),
        //},
        //tidak pungsi
 //       success: function (res) {
   //       console.log(res);
     //       var dataResult = JSON.parse(res);
      //      console.log(dataResult);
        //    $.each( dataResult.data, function( key, value ) {
          //    console.log(value.Kode);
            //    let No_po = value.Kode.replace(/\s/g, '');
              //  console.log(No_po);
                //item += '<option value='+No_po +'>'+value.Kode +'</option>';
                
            //});
            //$("[name=No_po]").append(item);
        //}
//    });
//}
//function hanyaAngka(evt) {
  //  var charCode = (evt.which) ? evt.which : event.keyCode
    //if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    //return false;
    //return true;
//}
</script>
-->
</html>
