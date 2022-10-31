let globalPage = 1;

// function action button enter
function setupEventHandler() {
  $(".filter input").keypress(function (event) {
    if (event.keyCode == 13) {
      search(1);
    }
  });

  $(".modal input").keypress(function (event) {
    if (event.keyCode == 13) {
      save();
    }
  });
}

// select role
function selectRole() {
  // let url = "/api/combo/role"
  // commonAPI.getAPI(url, (response) => {
  //     // console.log(response)
  //     if(response.status==200){
  //         // refine structure
  //         let data = response.data
  //         for (let index in data){
  //             $('#role').append($('<option />').val(`${data[index].value}`).html(`${data[index].label}`));
  //         }
  //     }
  // })
}

function buildTemplate(data, index, page, perPage) {
  let rows = `
      <tr class='template-data'>
         <td style='text-align: center'>
            ${parseInt(perPage * (page - 1)) + parseInt(index) + 1}
         </td>
         <td>${data[index].user_name} <br/>
            <span style='color: #b1b1b1'>@${data[index].user_username}</span>
         </td>
         <td>${data[index].user_email} <br/>
            <span style='color: #b1b1b1'>${data[index].user_phone}</span>
         </td>
         <td>${data[index].created_date} <br/>
            ${data[index].user_banned == 1 ? "Blocked" : "Active"}
         </td>
         <td>${data[index].user_role}</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button"          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="role">
                     ${checkRole(data[index].user_role, data[index].user_id)}
                  </div>
                  <div class="banned">${checkUserBanned(
                    data[index].user_banned,
                    data[index].user_id
                  )}
                  </div>
               </div>
            </div>
         </td>
      </tr>
   `;

  return rows;
}

function checkRole(user_role, user_id) {
  let rowsRole = "";
  if (user_role != "partner") {
    if (user_role == "user") {
      rowsRole += `
        <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='setAdmin(\"${user_id}\")'><i class='fa fa-user feather-16'></i> Make Admin
        </button>
        <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='setSuperAdmin(\"${user_id}\")'><i class='fa fa-user feather-16'></i> Make S-Admin
        </button>
        <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='setAdminAds(\"${user_id}\")'><i class='fa fa-user feather-16'></i> Make Admin Ads
        </button>
      `;
    } else {
      rowsRole += `
        <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='removeAdmin(\"${user_id}\")'><i class='fa fa-user feather-16'></i> Remove Admin
        </button>
      `;
    }
  }
  return rowsRole;
}

function checkUserBanned(user_banned, user_id) {
  let rowsBanned = "";
  if (user_banned == 1) {
    rowsBanned += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='unblock(\"${user_id}\")'><i class='fa fa-user feather-16'></i> Unblock
         </button>
      `;
  } else {
    rowsBanned += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='block(\"${user_id}\")'><i class='fa fa-ban feather-16'></i> Block
         </button>
      `;
  }
  return rowsBanned;
}

// clear value filter search
function clearFilter() {
  $("#filterUsername").val("");
  $("#filterName").val("");
  $("#filterEmail").val("");
  $("#filterPhone").val("");
  $("#filterStatus").val("");
  $("#filterRole").val("");
  globalPage = 1;
  search();
}

function setUpInfo(structure) {
  // clear
  $("#pagination").html("");
  $("#tableInfo").html("");

  $("#pagination").append(commonJS.buildPagination(structure));
  $("#tableInfo").append(commonJS.buildTableInfo(structure));
  $("#selectPage").on("change", function (val) {
    globalPage = $("#selectPage option:selected").val();
    search();
  });
}

function search(page) {
  if (!page) page = globalPage;
  let url = `${baseUrl}/api/user/get?page=` + page;

  let filterName = $("#filterName").val();
  let filterUsername = $("#filterUsername").val();
  let filterEmail = $("#filterEmail").val();
  let filterPhone = $("#filterPhone").val();
  let filterStatus = $("#filterStatus").val();
  let filterRole = $("#filterRole").val();
  let params = `&user_username=${filterUsername}&user_email=${filterEmail}&user_name=${filterName}&user_phone=${filterPhone}&user_banned=${filterStatus}&user_role=${filterRole}`;

  $(".template-data").remove();
  commonJS.loading(true);
  commonAPI.getAPI(url + params, (response) => {
    // console.log(response)
    if (response.status == 200) {
      // refine structure
      let structure = response.data;
      let data = structure.data;

      // force search from page 1
      if (data.length == 0 && structure.current_page != 1) {
        globalPage = 1;
        search();
        return;
      }

      let rows = "";
      if (data.length == 0) {
        $("#nodata").show();
      } else {
        $("#nodata").hide();
      }
      for (let index in data) {
        rows += buildTemplate(data, index, page, structure.per_page);
      }

      $("#data-table>tbody").append(rows);
      setUpInfo(structure);
      commonJS.loading(false);
    } else if (response.status == 401) {
      commonJS.swalError(response.message, function () {
        window.location = `${baseUrl}/logout`;
      });
    }
  });
}

// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
  // $("#id").val('');
  // $("#name").val('');
  // $("#email").val('');
  // $("#password").val('');
  // $("#role").val('');
});

// function add
function add() {
  $("#modalForm").modal("show");
  $("#modalLabel").text("Add User Data");
  $("#pass").html(`
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>`);
}

// function save
function save() {
  const regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  commonJS.clearMessage();
  if ($("#name").val() == "") {
    $("#name").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Name"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#email").val() == "") {
    $("#email").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Email"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#role").val() == "") {
    $("#role").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Role"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if (!regex.test($("#email").val())) {
    $("#email").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Email"], commonMsg.MSG_EMAIL_NOT_VALID)
    );
    return;
  }

  commonJS.loading(true);

  // harus kaya gini, kalau langsung ke jquery ga kedeteksi
  // let data
  let name = $("#name").val();
  let email = $("#email").val();
  let role = $("#role").val();

  if ($("#id").val() == "") {
    // validasi input password
    if ($("#password").val() == "") {
      $("#password").focus();
      commonJS.showErrorMessage(
        "#msgBox",
        commonMsg.getMessage(["Password"], commonMsg.MSG_REQUIRED)
      );
      return;
    }

    if ($("#password").val().length < 8) {
      $("#password").focus();
      commonJS.showErrorMessage(
        "#msgBox",
        commonMsg.getMessage(["Password"], commonMsg.MSG_MIN_8_CHAR)
      );
      return;
    }

    // get value input password
    let password = $("#password").val();

    let data = {
      name: name,
      email: email,
      password: password,
    };

    commonAPI.postAPI(
      "/api/register",
      data,
      function (response) {
        commonJS.loading(false);
        search();
        $("#modalForm").modal("hide");
      },
      function (response) {
        commonJS.loading(false);
        commonJS.swalError(response.responseJSON.message);
      }
    );
  } else {
    // json data
    let data = {
      name: name,
      email: email,
      role: role,
    };
    commonAPI.putAPI(
      "/api/user/put/" + $("#id").val(),
      data,
      function (response) {
        commonJS.loading(false);
        search();
        $("#modalForm").modal("hide");
      },
      function (response) {
        commonJS.loading(false);
        commonJS.swalError(response.responseJSON.message);
      }
    );
  }
}

// function edit
function edit(id) {
  $("#modalForm").modal("show");
  $("#modalLabel").text("Edit User Data");
  $("#pass").html(``);
  commonJS.loading(true);
  commonAPI.getAPI(`/api/user/get/${id}`, (response) => {
    if (response.status == 200) {
      $("#id").val(response.data.id);
      $("#name").val(response.data.name);
      $("#email").val(response.data.email);
      $("#role").val(response.data.role);
      commonJS.loading(false);
    } else if (response.status == 401) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    }
  });
}

function block(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to block this user?",
    "Yes",
    "No",
    commonAPI.deleteAPI,
    `/api/user/block/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    }
  );
}

function unblock(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to unblock this user?",
    "Yes",
    "No",
    commonAPI.deleteAPI,
    `/api/user/unblock/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    }
  );
}

function setAdmin(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to set this user as Admin?",
    "Yes",
    "No",
    commonAPI.postAPIAsync,
    `/api/user/admin/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    },
    {}
  );
}

function setSuperAdmin(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to set this user as Super Admin?",
    "Yes",
    "No",
    commonAPI.postAPIAsync,
    `/api/user/superadmin/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    },
    {}
  );
}

function removeAdmin(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to set this user as User?",
    "Yes",
    "No",
    commonAPI.postAPIAsync,
    `/api/user/removeadmin/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    },
    {}
  );
}

function setAdminAds(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to set this user as Admin Ads?",
    "Yes",
    "No",
    commonAPI.postAPIAsync,
    `/api/user/adminads/${id}`,
    function (response) {
      commonJS.loading(false);
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    },
    {}
  );
}

$(function () {
  // on document ready
  // selectRole()
  setupEventHandler();
  search();
});
