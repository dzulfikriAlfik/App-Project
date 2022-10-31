$(function () {
   // on document ready
   let ads_type = $("#AdsType").val();
   let platform = ads_type.split(" - ")[0];
   if (platform == "Twitter") {
      // commonJS.swalError("this type is twitter");
      $("#AdsImage").remove();
      $("#AdsTitle").remove();
      $("#AdsDesc").remove();
      $("#AdsPlacement").remove();
      setPlatform("Twitter");
   }

   $("#adsStartDate").datetimepicker({
      //
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
      widgetPositioning: {
         horizontal: "right",
         vertical: "bottom",
      },
   });
   $("#adsEndDate").datetimepicker({
      //
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
      widgetPositioning: {
         horizontal: "right",
         vertical: "bottom",
      },
   });
});

let platform = "";

function setPlatform(input) {
   platform = input;
}

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
   // window.location.reload(true);
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

   let id = $("#ads_type").val();
   commonAPI.getAPI(`/api/ads_type/get/${id}`, (response) => {
      if (response.status == 200) {
         // refine structure
         let data = response.data;
         let ratio = data.ads_type_width / data.ads_type_height;
         cropper = new Cropper(croppingImage, {
            aspectRatio: ratio,
         });
      } else if (response.status == 401) {
         commonJS.swalError(response.message, function () {
            window.location = "/logout";
         });
      }
   });

   $("#ads_type").on("change", function () {
      cropper.destroy();
      let id = $("#ads_type").val();
      commonAPI.getAPI(`/api/ads_type/get/${id}`, (response) => {
         if (response.status == 200) {
            // refine structure
            let data = response.data;
            // get ratio and set for cropper
            let ratio = data.ads_type_width / data.ads_type_height;
            cropper = new Cropper(croppingImage, {
               aspectRatio: ratio,
            });
         } else if (response.status == 401) {
            commonJS.swalError(response.message, function () {
               window.location = "/logout";
            });
         }
      });
   });

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
   // console.log(platform);
   if (platform == "Twitter") {
      ads_title = "null";
      ads_desc = "null";
      ads_placement = "null";
      ads_image = "twitter.png";
      ads_type = $("#AdsTypeId").val();
   } else {
      ads_title = $("#ads_title").val();
      ads_desc = $("#ads_desc").val();
      ads_type = $("#ads_type").val();
      ads_placement = $("#ads_placement").val();
      existing_image = $("#ads_image").val(); //return nameimage.png
      edited_ads_image = $("#previewAdsImage").attr("src"); //return location/to/folder/nameimage.png or imagebase64
      // split location to array, it's return like => ["location", "folder", "nameimage.png"]
      const myArray = edited_ads_image.split("/");

      //check is partner edit image or not
      if (existing_image == myArray[3]) {
         // partner doesn't edited his image
         ads_image = existing_image;
      } else {
         // partner edited his image
         ads_image = edited_ads_image;
      }

      if (ads_title == "") {
         $("#ads_title").focus();
         commonJS.swalError("Ads Title can't be null");
         return;
      }

      if (ads_desc == "") {
         $("#ads_desc").focus();
         commonJS.swalError("Ads Description can't be null");
         return;
      }

      if (ads_placement == "") {
         $("#ads_placement").focus();
         commonJS.swalError("Ads Placement can't be null");
         return;
      }

      if (ads_type == "") {
         $("#ads_type").focus();
         commonJS.swalError("Ads Type can't be null");
         return;
      }
   }

   // universal input
   ads_link = $("#ads_link").val();
   ads_start_date = $("#ads_start_date").val();
   ads_end_date = $("#ads_end_date").val();

   if (ads_link == "") {
      $("#ads_link").focus();
      commonJS.swalError("Ads Link can't be null");
      return;
   }

   if (ads_start_date == "") {
      $("#ads_start_date").focus();
      commonJS.swalError("Ads Start Date can't be null");
      return;
   }

   if (ads_end_date == "") {
      $("#ads_end_date").focus();
      commonJS.swalError("Ads End Date can't be null");
      return;
   }

   if (
      commonJS.getUnixTimeStamp(ads_start_date) >=
      commonJS.getUnixTimeStamp(ads_end_date)
   ) {
      commonJS.swalError("Iklan selesai harus lebih baru dari iklan mulai");
      return;
   }

   let data = {
      ads_title: ads_title,
      ads_desc: ads_desc,
      ads_link: ads_link,
      ads_type: ads_type,
      ads_start_date: ads_start_date,
      ads_end_date: ads_end_date,
      ads_placement: ads_placement,
      ads_image: ads_image,
   };

   console.log(data);

   commonAPI.putWithImageBase64API(
      "/api/ads/put/" + $("#ads_id").val(),
      data,
      function (response) {
         commonJS.loading(false);
         console.log(data);
         commonJS.swalOk(
            "Data berhasil diubah. Status iklan anda akan menjadi pending dan akan kami review. Terimakasih",
            function () {
               window.location.href = "/cms/manage_ads";
            }
         );
         // search();
         $("#modalForm").modal("hide");
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
