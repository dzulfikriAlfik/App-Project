$(function () {
   //
});

function save() {
   let data = {
      user_password: $("#edit_user_password").val(),
   };
   let user_password_conf = $("#edit_user_passwordConf").val();

   commonJS.clearMessage();

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
   } else {
      commonJS.swalOk("Password tidak diubah", function () {});
      return;
   }

   // console.log(data);
   let user_id = $("#edit_user_id").val();
   commonAPI.putAPI(
      `/api/admin_pass/put/${user_id}`,
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk("Password berhasil diubah", function () {
            window.location.href = "/cms/profile-admin-ads";
         });
         $("#modalForm").modal("hide");
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
