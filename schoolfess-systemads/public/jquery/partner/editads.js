$(function () {
   // on document ready
});

function openModal() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Edit Image");
   cropper();
}

// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   $("#upload_image").val("");
   $("#cropped_image").attr("src", "");
   $("#cropperImageUpload").val("");
});

function cropper() {
   var croppingImage = document.querySelector("#croppingImage"),
      img_w = document.querySelector(".img-w"),
      cropBtn = document.querySelector(".crop"),
      croppedImg = document.querySelector(".cropped-img"),
      dwn = document.querySelector(".download"),
      upload = document.querySelector("#cropperImageUpload"),
      cropper = "";

   $(".file-upload-browse").on("click", function (e) {
      var file = $(this)
         .parent()
         .parent()
         .parent()
         .find(".file-upload-default");
      file.trigger("click");
   });

   cropper = new Cropper(croppingImage);

   // on change show image with crop options
   upload.addEventListener("change", function (e) {
      $(this)
         .parent()
         .find(".form-control")
         .val(
            $(this)
               .val()
               .replace(/C:\\fakepath\\/i, "")
         );
      if (e.target.files.length) {
         cropper.destroy();
         // start file reader
         const reader = new FileReader();
         reader.onload = function (e) {
            if (e.target.result) {
               croppingImage.src = e.target.result;
               cropper = new Cropper(croppingImage, {
                  aspectRatio: 1,
               });
            }
         };
         reader.readAsDataURL(e.target.files[0]);
      }
   });

   // crop on click
   cropBtn.addEventListener("click", function (e) {
      e.preventDefault();
      // get result to data uri
      let imgSrc = cropper
         .getCroppedCanvas({
            // width: img_w.value, // input value
            width: 500,
         })
         .toDataURL();
      croppedImg.src = imgSrc;
      $("#previewAdsImage").attr("src", imgSrc);
      $("#modalForm").modal("hide");
   });
}

function save() {
   ads_title = $("#ads_title").val();
   ads_desc = $("#ads_desc").val();
   ads_link = $("#ads_link").val();
   ads_placement = $("#ads_placement").val();
   existing_image = $("#ads_image").val(); //return nameimage.png
   edited_ads_image = $("#previewAdsImage").attr("src"); //return location/to/folder/nameimage.png or imagebase64
   let ads_image = "";
   const myArray = edited_ads_image.split("/");

   //check is partner edit image or not
   if (existing_image == myArray[3]) {
      // partner doesn't edited his image
      ads_image = existing_image;
   } else {
      // partner edited his image
      ads_image = edited_ads_image;
   }

   let data = {
      ads_title: ads_title,
      ads_desc: ads_desc,
      ads_link: ads_link,
      ads_placement: ads_placement,
      ads_image: ads_image,
   };

   commonAPI.putWithImageBase64API(
      "/api/ads/put/" + $("#ads_id").val(),
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk("Data berhasil diubah", function () {
            window.location.href = "/cms/manage_ads";
         });
         // search();
         $("#modalForm").modal("hide");
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
