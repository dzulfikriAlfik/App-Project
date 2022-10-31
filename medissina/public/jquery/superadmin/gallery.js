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

function buildTemplate(data, index, page, perPage) {
  data = data[index];
  let rows = `
    <tr class='template-data'>
      <td style='text-align: center'>
        ${parseInt(perPage * (page - 1)) + parseInt(index) + 1}
      </td>
      <td class="text-center">${data.title}</td>
      <td class="text-center">${data.image}</td>
      <td class="text-center">${data.gallery_date}</td>
      <td class="text-center">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
            Action
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          </div>
        </div>
      </td>
    </tr>
   `;

  return rows;
}

function search(page) {
  if (!page) page = globalPage;
  let url = `${baseUrl}/api/gallery/get?page=${page}`;

  let filterJudul = $("#filter-judul").val();
  let params = `&title=${filterJudul}`;

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

// clear value filter search
function clearFilter() {
  $("#filter-judul").val("");
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
  $("#modalLabel").text("Tambah foto kegiatan");
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

$(function () {
  // on document ready
  setupEventHandler();
  search();
});
