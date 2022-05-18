// console.log("userprofile terpanggil");

$(document).ready(function () {
   var $modal = $("#modal");

   var image = document.getElementById("sample_image");

   var cropper;

   $("#upload_image").change(function (event) {
      var files = event.target.files;

      var done = function (url) {
         image.src = url;
         $modal.modal("show");
      };

      if (files && files.length > 0) {
         reader = new FileReader();
         reader.onload = function (event) {
            done(reader.result);
         };
         reader.readAsDataURL(files[0]);
      }
   });

   $modal
      .on("shown.bs.modal", function () {
         cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: ".preview",
         });
      })
      .on("hidden.bs.modal", function () {
         cropper.destroy();
         cropper = null;
      });

   $("#crop").click(function () {
      canvas = cropper.getCroppedCanvas({
         width: 400,
         height: 400,
      });

      canvas.toBlob(function (blob) {
         url = URL.createObjectURL(blob);
         var reader = new FileReader();
         reader.readAsDataURL(blob);
         reader.onloadend = function () {
            var base64data = reader.result;
            let data = {
               image: base64data,
            };
            commonAPI.postFormDataAPI(
               "/api/user/upload",
               data,
               // onsuccess
               function (response) {
                  if (!response.error) {
                     // search();
                     $modal.modal("hide");
                     commonJS.swalOk("Image Button Clicked");
                     // $("#uploaded_image").attr("src", response);
                  }
                  commonJS.loading(false);
               },
               // onerror
               function (response) {
                  commonJS.loading(false);
                  commonJS.swalError(response.responseJSON.message);
               }
            );
         };
      });
   });
});
// commonAPI.postFormDataAPI(
//    "/api/user/upload",
//    data,
//    // onsuccess
//    function (response) {
//       if (!response.error) {
//          // search();
//          $modal.modal("hide");
//          commonJS.swalOk("Image Button Clicked");
//          // $("#uploaded_image").attr("src", response);
//       }
//       commonJS.loading(false);
//    },
//    // onerror
//    function (response) {
//       commonJS.loading(false);
//       commonJS.swalError(response.responseJSON.message);
//    }
// );

// $.ajax({
//    url: "/api/user/upload",
//    method: "POST",
//    data: {
//       image: base64data,
//    },
//    success: function (data) {
//       $modal.modal("hide");
//       // $("#uploaded_image").attr("src", data);
//       console.log(data);
//       commonJS.swalOk("Image Button Clicked");
//    },
// });
