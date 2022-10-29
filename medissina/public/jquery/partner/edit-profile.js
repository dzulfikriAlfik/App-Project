$(function () {
   //
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
   // window.location.reload(true);
});

function cropper() {
   var croppingImageUser = document.querySelector("#croppingImageUser"),
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

   cropper = new Cropper(croppingImageUser, {
      aspectRatio: 1,
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
               croppingImageUser.src = e.target.result;
               cropper = new Cropper(croppingImageUser, {
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
      $("#previewPartnerImage").attr("src", imgSrc);
      $("#modalForm").modal("hide");
   });
}

function save() {
   let data = {
      user_name: $("#edit_user_name").val(),
      user_email: $("#edit_user_email").val(),
      user_phone: $("#edit_user_phone").val(),
      user_company: $("#edit_user_company").val(),
      user_company_type: $("#edit_user_company_type").val(),
      user_password: $("#edit_user_password").val(),
   };
   let user_password_conf = $("#edit_user_passwordConf").val();
   let emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
   let existing_user_image = $("#edit_user_image").val(); //return nameimage.png
   let edited_user_image = $("#previewPartnerImage").attr("src"); //return location/to/folder/nameimage.png or imagebase64
   const myArray = edited_user_image.split("/");

   //check is partner edit image or not
   if (existing_user_image == myArray[3]) {
      // partner doesn't edited his image
      data.user_image = existing_user_image;
   } else {
      // partner edited his image
      data.user_image = edited_user_image;
   }

   commonJS.clearMessage();

   if (data.user_name == "") {
      $("#edit_user_name").focus();
      commonJS.swalError("User name can't be null");
      return;
   }

   if (data.user_email == "") {
      $("#edit_user_email").focus();
      commonJS.swalError("User email can't be null");
      return;
   }

   if (!emailPattern.test(data.user_email)) {
      $("#edit_user_email").focus();
      commonJS.swalError(
         "Email is not valid (should be : youremail@domain.com)"
      );
      return;
   }

   if (data.user_phone == "") {
      $("#edit_user_phone").focus();
      commonJS.swalError("User phone can't be null");
      return;
   }

   if ($.isNumeric(data.user_phone) == false) {
      $("#edit_user_phone").focus();
      $("#edit_user_phone").val("");
      commonJS.swalError("User phone should be integer");
      return;
   }

   if (data.user_company == "") {
      $("#edit_user_company").focus();
      commonJS.swalError("User company can't be null");
      return;
   }

   if (data.user_company_type == "") {
      $("#edit_user_company_type").focus();
      commonJS.swalError("User company type can't be null");
      return;
   }

   if (data.user_password != "") {
      if (user_password_conf != data.user_password) {
         $("#edit_user_passwordConf").focus();
         commonJS.swalError(
            "Password Confirmation should be the same with password"
         );
         return;
      } else if (data.user_password.length <= 5) {
         $("#edit_user_password").focus();
         commonJS.swalError("Minimal length password is 6");
         return;
      }
   }

   // console.log(data);
   let user_id = $("#edit_user_id").val();
   commonAPI.putWithImageBase64API(
      `/api/user_partner/put/${user_id}`,
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk("Data berhasil diubah", function () {
            // window.location.href = "/cms/userprofile";
            window.location.reload(true);
         });
         $("#modalForm").modal("hide");
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
