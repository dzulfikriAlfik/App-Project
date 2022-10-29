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
         <td>${data[index].ads_type_id}</td>
         <td>${data[index].ads_type_name}</td>
         <td>${data[index].ads_platform_name}</td>
         <td class="text-center">
            ${data[index].ads_type_width} : ${data[index].ads_type_height}
         </td>
         <td>Rp${commonJS.formatNumber(data[index].ads_type_price)},-<br/>
            <span style='color: #b1b1b1'>${data[index].ads_type_used}</span>
         </td>
         <td class="text-center">${
            data[index].ads_type_status == 0 ? "Inactive" : "Active"
         }</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  ${activateAdsType(
                     data[index].ads_type_status,
                     data[index].ads_type_id
                  )}
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='edit(\"${
                     data[index].ads_type_id
                  }\")'><i class='fa fa-edit feather-16'></i> Edit
                  </button>
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='deleteAdsType(\"${
                     data[index].ads_type_id
                  }\")'><i class='fa fa-trash feather-16'></i> Delete
                  </button>
               </div>
            </div>
         </td>
      </tr>
   `;

   return rows;
}

function activateAdsType(ads_type_status, ads_type_id) {
   let rowsApproveAds = "";
   if (ads_type_status == 0) {
      // if pending
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='activate(\"${ads_type_id}\")'><i class='fa fa-check feather-16'></i> Activate
         </button>
      `;
   } else if (ads_type_status == 1) {
      // if approved
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='inactive(\"${ads_type_id}\")'><i class='fa fa-ban feather-16'></i> Inactive
         </button>
      `;
   }
   return rowsApproveAds;
}

// clear value filter search
function clearFilter() {
   $("#filterAdsType").val("");
   $("#filterAdsPlatform").val("");
   $("#filterAdsTypeStatus").val("");
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
   let url = `/api/ads_type/get?page=${page}`;
   let filterAdsType = $("#filterAdsType").val();
   let filterAdsPlatform = $("#filterAdsPlatform").val();
   let filterAdsTypeStatus = $("#filterAdsTypeStatus").val();
   let params = `&ads_type_name=${filterAdsType}&ads_platform_id=${filterAdsPlatform}&ads_type_status=${filterAdsTypeStatus}`;

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
   $("#modalLabel").text("Add Ads Type Data");
   $("#type_modal").val("add");
}

// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   $("#ads_type_id").val("");
   $("#ads_type_name").val("");
   $("#ads_platform_id").val("");
   $("#ads_type_width").val("");
   $("#ads_type_height").val("");
   $("#ads_type_price").val("");
   $("#ads_type_used").val("");
});

function save() {
   // harus kaya gini, kalau langsung ke jquery ga kedeteksi
   // var data
   let adsTypeIdLama = $("#adsTypeIdLama").val();
   let ads_type_id = $("#ads_type_id").val();
   let ads_type_name = $("#ads_type_name").val();
   let ads_platform_id = $("#ads_platform_id").val();
   let ads_type_width = $("#ads_type_width").val();
   let ads_type_height = $("#ads_type_height").val();
   let ads_type_price = $("#ads_type_price").val();
   let ads_type_used = $("#ads_type_used").val();
   let type_modal = $("#type_modal").val();

   commonJS.clearMessage();
   if (ads_type_id == "") {
      $("#ads_type_id").focus();
      commonJS.swalError("Ads Type Id is required");
      return;
   }
   if (ads_type_name == "") {
      $("#ads_type_name").focus();
      // commonJS.showErrorMessage(
      //    "#msgBox",
      //    commonMsg.getMessage(["Content"], commonMsg.MSG_REQUIRED)
      // );
      commonJS.swalError("Ads type name is required");
      return;
   }
   if (ads_platform_id == "") {
      $("#ads_platform_id").focus();
      commonJS.swalError("Ads platform is required");
      return;
   }
   if (ads_type_price == "") {
      $("#ads_type_price").focus();
      commonJS.swalError("Ads type price is required");
      return;
   }
   if ($.isNumeric(ads_type_price) == false) {
      $("#ads_type_price").focus();
      $("#ads_type_price").val("");
      commonJS.swalError("Ads type price should be integer");
      return;
   }
   if (ads_type_used == "") {
      $("#ads_type_used").focus();
      commonJS.swalError("Ads type used is required");
      return;
   }
   if (ads_type_width == "") {
      $("#ads_type_width").focus();
      commonJS.swalError("Ads type width is required");
      return;
   }
   if ($.isNumeric(ads_type_width) == false) {
      $("#ads_type_width").focus();
      $("#ads_type_width").val("");
      commonJS.swalError("Ads type width should be integer");
      return;
   }
   if (ads_type_height == "") {
      $("#ads_type_height").focus();
      commonJS.swalError("Ads type height is required");
      return;
   }
   if ($.isNumeric(ads_type_height) == false) {
      $("#ads_type_height").focus();
      $("#ads_type_height").val("");
      commonJS.swalError("Ads type height should be integer");
      return;
   }

   commonJS.loading(true);

   if (type_modal == "add") {
      let data = {
         ads_type_id: ads_type_id,
         ads_type_name: ads_type_name,
         ads_platform_id: ads_platform_id,
         ads_type_width: ads_type_width,
         ads_type_height: ads_type_height,
         ads_type_price: ads_type_price,
         ads_type_used: ads_type_used,
      };

      commonAPI.postAPI(
         "/api/ads_type/create",
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
         ads_type_id: ads_type_id,
         ads_type_name: ads_type_name,
         ads_platform_id: ads_platform_id,
         ads_type_width: ads_type_width,
         ads_type_height: ads_type_height,
         ads_type_price: ads_type_price,
         ads_type_used: ads_type_used,
      };

      commonAPI.putAPI(
         `/api/ads_type/put/${adsTypeIdLama}`,
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
   $("#modalLabel").text("Edit Ads Type Data");
   $("#type_modal").val("edit");
   commonJS.loading(true);
   commonAPI.getAPI(`/api/ads_type/get/${id}`, (response) => {
      if (response.status == 200) {
         $("#adsTypeIdLama").val(response.data.ads_type_id);
         $("#ads_type_id").val(response.data.ads_type_id);
         $("#ads_type_name").val(response.data.ads_type_name);
         $("#ads_platform_id").val(response.data.ads_platform_id);
         $("#ads_type_price").val(response.data.ads_type_price);
         $("#ads_type_used").val(response.data.ads_type_used);
         $("#ads_type_width").val(response.data.ads_type_width);
         $("#ads_type_height").val(response.data.ads_type_height);
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
      `/api/ads_type/activate/${id}`,
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
      "Are you sure you want to make this ads type inactive?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads_type/inactive/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("This ads has been inactive");
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

function deleteAdsType(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to delete this ads type?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads_type/destroy/${id}`,
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
