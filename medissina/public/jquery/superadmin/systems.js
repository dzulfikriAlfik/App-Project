var globalPage = 1;
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

/* ------------------------- Function buildTemplate ------------------------- */
function buildTemplate(data, index, page, perPage) {
  var rows = "";
  rows += "<tr class='template-data'>";
  rows += "<td style='text-align: center'>";
  rows += parseInt(perPage * (page - 1)) + parseInt(index) + 1;
  rows += "</td>";
  rows += "<td>";
  rows += data[index].sys_cat;
  rows += "</td>";
  rows += "<td>";
  rows += data[index].sys_sub_cat;
  rows += "</td>";
  rows += "<td>";
  rows += data[index].sys_cd;
  rows += "</td>";
  rows += "<td>";
  rows += data[index].sys_val;
  rows += "</td>";
  rows += "<td>";
  rows += `
    <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">`;
  rows +=
    "<button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='edit(\"" +
    data[index].sys_id +
    "\")' style='margin-right: 5px;'><i class='fa fa-pencil feather-16'></i> Edit</button>";
  rows +=
    "<button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='destroy(\"" +
    data[index].sys_id +
    "\")'><i class='fa fa-trash feather-16'></i> Delete</button>";
  rows += `</div>
    </div>`;
  rows += "</td>";
  rows += "</tr>";

  return rows;
}

/* -------------------------- Function clear filter ------------------------- */
function clearFilter() {
  $("#filterCategory").val("");
  $("#filterSubcategory").val("");
  $("#filterCode").val("");
  globalPage = 1;
  search();
}

/* --------------------------- Function setUpInfo --------------------------- */
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

/* ----------------------------- Function Search ---------------------------- */
function search(page) {
  if (!page) page = globalPage;
  var url = "/api/sys/get?page=" + page;

  var filterCategory = $("#filterCategory").val();
  var filterSubcategory = $("#filterSubcategory").val();
  var filterCode = $("#filterCode").val();
  var params =
    "&sys_cat=" +
    filterCategory +
    "&sys_sub_cat=" +
    filterSubcategory +
    "&sys_cd=" +
    filterCode;

  $(".template-data").remove();
  commonJS.loading(true);
  commonAPI.getAPI(url + params, (response) => {
    if (response.status == 200) {
      // refine structure
      var structure = response.data;
      var data = structure.data;

      // force search from page 1
      if (data.length == 0 && structure.current_page != 1) {
        globalPage = 1;
        search();
        return;
      }

      var rows = "";
      if (data.length == 0) {
        $("#nodata").show();
      } else {
        $("#nodata").hide();
      }
      for (var index in data) {
        rows += buildTemplate(data, index, page, structure.per_page);
      }

      $("#data-table>tbody").append(rows);
      setUpInfo(structure);
      commonJS.loading(false);
    } else if (response.status == 401) {
      commonJS.swalError(response.message, function () {
        window.location = "/logout";
      });
    }
  });
}

/* ------------------------------ Function Add ------------------------------ */
function add() {
  $("#modalForm").modal("show");
  $("#modalLabel").text("Add System Data");
}

/* ------------------------------ Function Save ----------------------------- */
function save() {
  commonJS.clearMessage();
  if ($("#sys_cat").val() == "") {
    $("#sys_cat").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Category"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#sys_sub_cat").val() == "") {
    $("#sys_sub_cat").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Subcategory"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#sys_cd").val() == "") {
    $("#sys_cd").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Code"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#sys_val").val() == "") {
    $("#sys_val").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Value"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  if ($("#remark").val() == "") {
    $("#remark").focus();
    commonJS.showErrorMessage(
      "#msgBox",
      commonMsg.getMessage(["Remark"], commonMsg.MSG_REQUIRED)
    );
    return;
  }

  commonJS.loading(true);

  // harus kaya gini, kalau langsung ke jquery ga kedeteksi
  // var data
  let sys_cat = $("#sys_cat").val();
  let sys_sub_cat = $("#sys_sub_cat").val();
  let sys_cd = $("#sys_cd").val();
  let sys_val = $("#sys_val").val();
  let remark = $("#remark").val();

  // json data
  let data = {
    sys_cat: sys_cat,
    sys_sub_cat: sys_sub_cat,
    sys_cd: sys_cd,
    sys_val: sys_val,
    remark: remark,
  };

  if ($("#sys_id").val() == "") {
    commonAPI.postAPI(
      "/api/sys/create",
      data,
      function (response) {
        if (!response.error) {
          search();
          $("#modalForm").modal("hide");
        }
        commonJS.loading(false);
      },
      function (response) {
        commonJS.loading(false);
        commonJS.swalError(response.responseJSON.message);
      }
    );
  } else {
    commonAPI.putAPI(
      "/api/sys/put/" + $("#sys_id").val(),
      data,
      function (response) {
        if (!response.error) {
          search();
          $("#modalForm").modal("hide");
        }
        commonJS.loading(false);
      },
      function (response) {
        commonJS.loading(false);
        commonJS.swalError(response.responseJSON.message);
      }
    );
  }
}

/* ------------------------------ Function Edit ----------------------------- */
function edit(id) {
  $("#modalForm").modal("show");
  $("#modalLabel").text("Edit System Data");
  commonJS.loading(true);
  commonAPI.getAPI(`/api/sys/get/${id}`, (response) => {
    if (response.status == 200) {
      $("#sys_id").val(response.data.sys_id);
      $("#sys_cat").val(response.data.sys_cat);
      $("#sys_sub_cat").val(response.data.sys_sub_cat);
      $("#sys_cd").val(response.data.sys_cd);
      $("#sys_val").val(response.data.sys_val);
      $("#remark").val(response.data.remark);
      commonJS.loading(false);
    } else if (response.status == 401) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    }
  });
}

/* ----------------------------- Function Update ---------------------------- */
function update() {
  // get value
  let id = $("#sys_id").val();
  let sys_cat = $("#sys_cat").val();
  let sys_sub_cat = $("#sys_sub_cat").val();
  let sys_cd = $("#sys_cd").val();
  let sys_val = $("#sys_val").val();
  let remark = $("#remark").val();
  // loading
  // loadingOn();
  // process
  $.ajax({
    url: `/api/sys/put/${id}`,
    datatype: "html",
    data: {
      sys_cat: sys_cat,
      sys_sub_cat: sys_sub_cat,
      sys_cd: sys_cd,
      sys_val: sys_val,
      remark: remark,
    },
    type: "PUT",
    headers: {
      Authorization: "Bearer " + localStorage.getItem("token"),
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function (response) {
      // console.log(response)
      $("#inputModal").modal("hide");
      read();

      if (response.status === 200) {
        commonJS.toastSuccess(response.message);
      } else if (response.status == 401) {
        commonJS.swalError(response.message).then(function () {
          window.location = "/logout";
        });
      }
    },

    error: function (response) {
      // console.log(response.responseJSON.message)

      commonJS.swalError(response.responseJSON.message);
    },
  });
}

/* ----------------------------- Function Delete ---------------------------- */
function destroy(id) {
  commonJS.swalConfirmAjax(
    "Are you sure you want to delete this data?",
    "Yes",
    "No",
    commonAPI.deleteAPI,
    `/api/sys/delete/${id}`,
    function (response) {
      if (response.status == 200) {
        search(globalPage);
      } else if (response.status == 401) {
        swalError(response.message);
      }
      commonJS.loading(false);
    },
    function (response) {
      commonJS.loading(false);
      commonJS.swalError(response.responseJSON.message);
    }
  );
}

/* ---------------------- clear value when modal close ---------------------- */
$(".modal").on("hidden.bs.modal", function () {
  $("#sys_id").val("");
  $("#sys_cat").val("");
  $("#sys_sub_cat").val("");
  $("#sys_cd").val("");
  $("#sys_val").val("");
  $("#remark").val("");
});

/* ---------------------------- on document ready --------------------------- */
$(function () {
  setupEventHandler();
  search();
});
