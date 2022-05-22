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
         <td>
            <img style='width:50px !important; height:auto !important; border-radius:0px !important;' src='/api/video/download/${
               data[index].ads_image
            }'/>
         </td>
         <td>${data[index].ads_title}</td>
         <td>
            ${data[index].ads_desc}
         </td>
         <td>${checkAdsStatus(data[index].ads_status)}</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="partner-active">
                     ${approveAds(data[index].ads_status, data[index].ads_id)}
                  </div>
               </div>
            </div>
         </td>
      </tr>
   `;

   return rows;
}

function checkAdsStatus(ads_status) {
   if (ads_status == 0) {
      return "Pending";
   } else if (ads_status == 1) {
      return "Approved";
   } else if (ads_status == 2) {
      return "Rejected";
   } else {
      return "Suspended";
   }
}

function approveAds(ads_status, ads_id) {
   let rowsApproveAds = "";
   if (ads_status == 0 || ads_status == 1) {
      // if pending
      rowsApproveAds += `
         <a href="/cms/ads_edit" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-edit feather-16'></i> Edit
         </a>
         <a href="#" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-eye feather-16'></i> Show Detail
         </a>
      `;
   } else {
      // if rejected & suspended
      rowsApproveAds += `
         <a href="#" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-flag feather-16'></i> See why?
         </a>
      `;
   }
   return rowsApproveAds;
}

// clear value filter search
function clearFilter() {
   $("#filterAdsTitle").val("");
   $("#filterPlacement").val("");
   $("#filterCreatedAt").val("");
   $("#filterCompanyName").val("");
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
   let url = `/api/ads/partner_ads?page=${page}`;

   let filterAdsTitle = $("#filterAdsTitle").val();
   let filterPlacement = $("#filterPlacement").val();
   let filterCreatedAt = $("#filterCreatedAt").val();
   let filterCompanyName = $("#filterCompanyName").val();
   let params = `&ads_title=${filterAdsTitle}&ads_placement=${filterPlacement}&created_dt=${filterCreatedAt}&created_by=${filterCompanyName}`;

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

/* ------------------------------ Function Add ------------------------------ */
function add() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Ads Data");
}
/* ------------------------------ End Function Add ------------------------------ */

function save() {
   commonJS.clearMessage();
   if ($("#ads_title").val() == "") {
      $("#ads_title").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Title"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#ads_desc").val() == "") {
      $("#ads_desc").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Description"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#ads_placement").val() == "") {
      $("#ads_placement").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Placement"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#ads_image").val() == "") {
      $("#ads_image").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Image"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   commonJS.loading(true);

   // harus kaya gini, kalau langsung ke jquery ga kedeteksi
   // var data
   let ads_title = $("#ads_title").val();
   let ads_desc = $("#ads_desc").val();
   let ads_placement = $("#ads_placement").val();
   let ads_image = $("#ads_image").val();

   let data = {
      ads_title: ads_title,
      ads_desc: ads_desc,
      ads_placement: ads_placement,
      ads_image: ads_image,
   };

   commonAPI.postAPI(
      "/api/ads/create",
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk("Data iklan berhasil ditambahkan");
         search();
         $("#modalForm").modal("hide");
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}

$("#ads_placement").on("change", function () {
   let ads_placement = $("#ads_placement").val();
});

$(function () {
   // on document ready
   // selectRole()
   setupEventHandler();
   search();
});
