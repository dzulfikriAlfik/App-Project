let globalPage = 1;

// function action button enter
function setupEventHandler() {
   $(".filter input").keypress(function (event) {
      if (event.keyCode == 13) {
         search(1);
      }
   });
}

function buildTemplate(data, index, page, perPage) {
   let rows = `
      <tr class='template-data'>
         <td style='text-align: center'>
            ${parseInt(perPage * (page - 1)) + parseInt(index) + 1}
         </td>
         <td>${data[index].ads_platform_name}</td>
         <td class="text-center">${
            data[index].ads_platform_status == 0 ? "Inactive" : "Active"
         }</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  ${activateAdsPlatform(
                     data[index].ads_platform_status,
                     data[index].ads_platform_id
                  )}
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='edit(\"${
                     data[index].ads_platform_id
                  }\")'><i class='fa fa-edit feather-16'></i> Edit
                  </button>
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='deleteAdsPlatform(\"${
                     data[index].ads_platform_id
                  }\")'><i class='fa fa-trash feather-16'></i> Delete
                  </button>
               </div>
            </div>
         </td>
      </tr>
   `;

   return rows;
}

function activateAdsPlatform(ads_platform_status, ads_platform_id) {
   let rowsApproveAds = "";
   if (ads_platform_status == 0) {
      // if inactive
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='activate(\"${ads_platform_id}\")'><i class='fa fa-check feather-16'></i> Activate
         </button>
      `;
   } else if (ads_platform_status == 1) {
      // if active
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='inactive(\"${ads_platform_id}\")'><i class='fa fa-ban feather-16'></i> Inactive
         </button>
      `;
   }
   return rowsApproveAds;
}

// clear value filter search
function clearFilter() {
   $("#filterAdsPlatform").val("");
   $("#filterAdsPlatformStatus").val("");
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
   let url = `/api/ads_platform/get?page=${page}`;

   let filterAdsPlatform = $("#filterAdsPlatform").val();
   let filterAdsPlatformStatus = $("#filterAdsPlatformStatus").val();
   let params = `&ads_platform_name=${filterAdsPlatform}&ads_platform_status=${filterAdsPlatformStatus}`;

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
            window.location = "/logout";
         });
      }
   });
}

// open modal when add button clicked
function add() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Ads Platform Data");
}

// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   $("#ads_platform_id").val("");
   $("#ads_platform_name").val("");
});

function save() {
   // harus kaya gini, kalau langsung ke jquery ga kedeteksi
   // var data
   let ads_platform_name = $("#ads_platform_name").val();

   commonJS.clearMessage();
   if (ads_platform_name == "") {
      $("#ads_platform_name").focus();
      // commonJS.showErrorMessage(
      //    "#msgBox",
      //    commonMsg.getMessage(["Content"], commonMsg.MSG_REQUIRED)
      // );
      commonJS.swalError("Ads platform name is required");
      return;
   }

   commonJS.loading(true);

   if ($("#ads_platform_id").val() == "") {
      let data = {
         ads_platform_name: ads_platform_name,
      };

      commonAPI.postAPI(
         "/api/ads_platform/create",
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
         ads_platform_name: ads_platform_name,
      };
      commonAPI.putAPI(
         "/api/ads_platform/put/" + $("#ads_platform_id").val(),
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
   $("#modalLabel").text("Edit Ads Platform Data");
   commonJS.loading(true);
   commonAPI.getAPI(`/api/ads_platform/get/${id}`, (response) => {
      if (response.status == 200) {
         $("#ads_platform_id").val(response.data.ads_platform_id);
         $("#ads_platform_name").val(response.data.ads_platform_name);
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   });
}

function activate(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to reactivate this ads type?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads_platform/activate/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("This ads has been activated successfully");
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

function inactive(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to make this ads platform inactive?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads_platform/inactive/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("This ads platform has been inactive");
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

function deleteAdsPlatform(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to delete this ads platform?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads_platform/destroy/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("Data deleted successfully");
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

$(function () {
   // on document ready
   // selectRole()
   setupEventHandler();
   search();
});
