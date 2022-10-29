// function action on enter
$(document).keypress(function (event) {
  if (event.keyCode == 13) {
    if (swal.isVisible()) {
      swal.close();
    } else {
      login();
    }
  }
});

// function login
function login() {
  let email = $("#email").val();
  let password = $("#password").val();
  let token = $("meta[name='csrf-token']").attr("content");
  let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

  if (email.length == "") {
    commonJS.swalError("Email is required");
  } else if (!pattern.test(email)) {
    commonJS.swalError("Email is not valid");
  } else if (password.length == "") {
    commonJS.swalError("Password is required");
  } else {
    $("#email").prop("disabled", true);
    $("#password").prop("disabled", true);
    $(".btn-login").prop("disabled", true);
    $.ajax({
      url: `${baseUrl}/api/login`,
      type: "POST",
      dataType: "JSON",
      data: {
        user_email: email,
        user_password: password,
        _token: token,
      },
      success: function (response) {
        localStorage.setItem("id_user", response.user.user_id);
        localStorage.setItem("token", response.token);
        window.location.href =
          `${baseUrl}/login_process/` + response.user.user_role;
      },

      error: function (response) {
        $("#email").prop("disabled", false);
        $("#password").prop("disabled", false);
        $(".btn-login").prop("disabled", false);

        commonJS.swalError(response.responseJSON.message);
      },
    });
  }
}

let url = window.location.href;
if (url.includes("?unAuth")) {
  commonJS.swalError(
    "Anda tidak memiliki izin untuk akses! Silahkan login terlebih dahulu!"
  );
}

function unAuth() {
  commonJS.swalError(
    "Anda tidak memiliki izin untuk akses! Silahkan login terlebih dahulu!"
  );
}
