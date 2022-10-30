// GET data user login
readUserLogin();

function readUserLogin() {
  $.ajax({
    url: `${baseUrl}/api/user/get/${localStorage.getItem("id_user")}`,
    headers: {
      Authorization: "Bearer " + localStorage.getItem("token"),
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      "Content-Type": "application/json",
    },
    method: "GET",
    dataType: "JSON",
    success: function (response) {
      // console.log(response);
      if (response.status == 200) {
        // console.log(response.data.user_image);
        if (response.data.user_image == null) {
          // console.log("null");
          $("#user_image").attr("src", `https://via.placeholder.com/80x80`);
          $("#user_image_sm").attr("src", `https://via.placeholder.com/30x30`);
          // for edit profile page
          $("#previewPartnerImage").attr(
            "src",
            `${baseUrl}/storage/user-profile/user.png`
          );
          $("#croppingImageUser").attr(
            "src",
            `${baseUrl}/storage/user-profile/user.png`
          );
        } else {
          $("#user_image").attr(
            "src",
            `${baseUrl}/storage/user-profile/${response.data.user_image}`
          );
          $("#user_image_sm").attr(
            "src",
            `${baseUrl}/storage/user-profile/${response.data.user_image}`
          );
          // for edit profile page
          $("#previewPartnerImage").attr(
            "src",
            `${baseUrl}/storage/user-profile/${response.data.user_image}`
          );
          $("#croppingImageUser").attr(
            "src",
            `${baseUrl}/storage/user-profile/${response.data.user_image}`
          );
        }
        $("#user_name").html(`${response.data.user_name}`);
        $("#user_email").html(`${response.data.user_email}`);
        $("#user_saldo").html(
          `Rp. ${commonJS.formatNumber(response.data.user_saldo)}`
        );

        // user_data = {
        //    user_id: response.data.user_id,
        //    user_name: response.data.user_name,
        //    user_role: response.data.user_role,
        //    user_email: response.data.user_email,
        //    user_image: response.data.user_image,
        //    user_status: response.data.user_status,
        //    user_phone: response.data.user_phone,
        //    user_company: response.data.user_company,
        //    user_company_type: response.data.user_company_type,
        //    user_saldo: response.data.user_saldo,
        // };
        // localStorage.setItem("user_data", JSON.stringify(user_data));
        $("#edit_user_id").val(response.data.user_id);
        $("#edit_user_role").val(response.data.user_role);
        $("#edit_user_image").val(response.data.user_image);
        $("#edit_user_name").val(response.data.user_name);
        $("#edit_user_email").val(response.data.user_email);
        $("#edit_user_phone").val(response.data.user_phone);
        $("#edit_user_company").val(response.data.user_company);
        $("#edit_user_company_type").val(response.data.user_company_type);
      } else if (response.status == 401) {
        commonJS.swalError(response.message, function () {
          localStorage.clear();
          window.location = `${baseUrl}/logout`;
        });
      }
    },
    error: function (response) {
      commonJS.swalError(response.responseJSON.message);
    },
  });
}

function logout() {
  commonJS.swalConfirm(
    "Apakah anda yakin ingin logout?",
    "Ya",
    "Tidak",
    function () {
      let token = localStorage.getItem("token");
      let data = {
        token: token,
      };
      localStorage.clear();
      window.location.href = `${baseUrl}/logout`;
      // commonAPI.getLogoutAPI("/api/logout", data, (response) => {
      //     if(response.status==200){
      //         window.location.href = '/logout';
      //     }
      // })
    }
  );
}
