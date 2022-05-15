var globalPage = 1;

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
   var rows = "";
   rows += `
      <tr class="template-data">
         <td style="text-align: center">
            ${parseInt(perPage * (page - 1)) + parseInt(index) + 1}
         </td>
         <td>${data[index].trivia_id}</td>   
         <td title="${data[index].trivia_text}">
            ${data[index].trivia_text.substr(0, 100)}
            ${data[index].trivia_text.length > 100 ? "..." : ""}
         </td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button type="button" class="btn btn-light btn-xs  dropdown-item" onClick="edit(${
                     data[index].trivia_id
                  })" style="margin-right: 5px;">
                     <i class="fa fa-pencil feather-16"></i> Edit
                  </button>
                  <button type="button" class="btn btn-light btn-xs  dropdown-item" onClick="destroy(${
                     data[index].trivia_id
                  })" style="margin-right: 5px;">
                     <i class='fa fa-trash feather-16'></i> Delete
                  </button>
               </div>
            </div>
         </td>
      </tr>
   `;
   return rows;
}

// clear value filter search
function clearFilter() {
   $("#filterContent").val("");
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
   var url = "/api/trivia/get?page=" + page;

   var filterContent = $("#filterContent").val();
   var params = "&trivia_text=" + filterContent;

   $(".template-data").remove();
   commonJS.loading(true);
   commonAPI.getAPI(url + params, (response) => {
      // console.log(response)
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

// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   $("#trivia_id").val("");
   $("#trivia_text").val("");
});

// function add
function add() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Trivia Data");
}

// function save
function save() {
   const regex =
      /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   commonJS.clearMessage();
   if ($("#trivia_text").val() == "") {
      $("#trivia_text").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Content"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   commonJS.loading(true);

   // harus kaya gini, kalau langsung ke jquery ga kedeteksi
   // var data
   let trivia_text = $("#trivia_text").val();

   if ($("#trivia_id").val() == "") {
      let data = {
         trivia_text: trivia_text,
      };

      commonAPI.postAPI(
         "/api/trivia/create",
         data,
         function (response) {
            commonJS.loading(false);
            commonJS.swalOk("Data berhasil ditambahkan");
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
         trivia_text: trivia_text,
      };
      commonAPI.putAPI(
         "/api/trivia/put/" + $("#trivia_id").val(),
         data,
         function (response) {
            commonJS.loading(false);
            commonJS.swalOk("Data berhasil diubah");
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
   $("#modalLabel").text("Edit Trivia Data");
   commonJS.loading(true);
   commonAPI.getAPI(`/api/trivia/get/${id}`, (response) => {
      if (response.status == 200) {
         $("#trivia_id").val(response.data.trivia_id);
         $("#trivia_text").val(response.data.trivia_text);
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   });
}

function destroy(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to delete this data?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/trivia/delete/${id}`,
      function (response) {
         if (response.status == 200) {
            commonJS.swalOk("Data berhasil dihapus");
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

$(function () {
   // on document ready
   // selectRole()
   setupEventHandler();
   search();
});
