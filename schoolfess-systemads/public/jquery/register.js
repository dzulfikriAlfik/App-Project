$(document).ready(function () {
   $(".btn-register").click(function () {
      let user_name = $("#user_name").val();
      let user_email = $("#user_email").val();
      let user_phone = $("#user_phone").val();
      let user_company = $("#user_company").val();
      let user_company_type = $("#user_company_type").val();
      let user_password = $("#user_password").val();
      let user_password_conf = $("#user_password_conf").val();
      let user_token = $("meta[name='csrf-token']").attr("content");
      let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

      if (user_name.length == "") {
         commonJS.swalError("Name is required");
      } else if (user_email.length == "") {
         commonJS.swalError("Email is required");
      } else if (!pattern.test(user_email)) {
         commonJS.swalError("Email is not valid");
      } else if (user_phone.length == "") {
         commonJS.swalError("No. Hp is required");
      } else if (user_company.length == "") {
         commonJS.swalError("Nama Perusahaan is required");
      } else if (user_company_type.length == "") {
         commonJS.swalError("Jenis Perusahaan is required");
      } else if (user_password.length == "") {
         commonJS.swalError("Password is required");
      } else if (user_password_conf !== user_password) {
         commonJS.swalError(
            "Confirmation password must be the same with password"
         );
      } else {
         $("#user_name").prop("disabled", true);
         $("#user_email").prop("disabled", true);
         $("#user_phone").prop("disabled", true);
         $("#user_company").prop("disabled", true);
         $("#user_company_type").prop("disabled", true);
         $("#user_password").prop("disabled", true);
         $("#user_password_conf").prop("disabled", true);
         $(".btn-register").prop("disabled", true);
         let user_data = {
            user_name: user_name,
            user_email: user_email,
            user_company: user_company,
            user_company_type: user_company_type,
            user_phone: user_phone,
            user_password: user_password,
            user_password_conf: user_password_conf,
            user_token: user_token,
         };
         console.log(user_data);
         $.ajax({
            url: "api/register",
            type: "POST",
            dataType: "JSON",
            data: user_data,
            success: function (response) {
               console.log(response);
               commonJS.swalOk(response.message, function () {
                  window.location.href = "/login";
               });
            },

            error: function (response) {
               commonJS.swalError(response.responseJSON.message);
            },
         });
      }

      // else {
      //    let data = {
      //       user_name: user_name,
      //       user_email: user_email,
      //       user_company: user_company,
      //       user_company_type: user_company_type,
      //       user_phone: user_phone,
      //       user_password: user_password,
      //       user_password_conf: user_password_conf,
      //       user_token: user_token,
      //    };
      //    console.log(data);
      // }
   });
});
