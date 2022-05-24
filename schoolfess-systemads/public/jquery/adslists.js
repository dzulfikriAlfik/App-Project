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
            <img style='width:150px !important; height:auto !important; border-radius:0px !important;' src="/storage/ads-image/${
               data[index].ads_image
            }"/>
         </td>
         <td>${data[index].ads_title}</td>
         <td>
            ${data[index].user_company} <br/>
            <span style='color: #b1b1b1'>${data[index].company_type}</span>
         </td>
         <td>${checkAdsStatus(data[index].ads_status)}</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="partner-active">${approveAds(
                     data[index].ads_status,
                     data[index].ads_id
                  )}
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
   if (ads_status == 0) {
      // if pending
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='approve(\"${ads_id}\")'><i class='fa fa-check feather-16'></i> Approve
         </button>
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='commonJS.swalAdsAction("reject",\"${ads_id}\",search)'><i class='fa fa-ban feather-16'></i> Reject
         </button>
         <a href="/cms/ads_detail/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-eye feather-16'></i> Show Detail
         </a>
      `;
   } else if (ads_status == 1) {
      // if approved
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='commonJS.swalAdsAction("suspend",\"${ads_id}\",search)'><i class='fa fa-ban feather-16'></i> Suspend
         </button>
         <a href="/cms/ads_detail/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-eye feather-16'></i> Show Detail
         </a>
      `;
   } else {
      // if rejected & suspended
      rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='approve(\"${ads_id}\")'><i class='fa fa-check feather-16'></i> Reactivate
         </button>
         <a href="/cms/ads_detail/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-eye feather-16'></i> Show Detail
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
   let url = `/api/ads/get?page=${page}`;

   let filterAdsTitle = $("#filterAdsTitle").val();
   let filterPlacement = $("#filterPlacement").val();
   let filterCreatedAt = $("#filterCreatedAt").val();
   let filterCompanyName = $("#filterCompanyName").val();
   let params = `&ads_title=${filterAdsTitle}&ads_placement=${filterPlacement}&created_dt=${filterCreatedAt}&user_company=${filterCompanyName}`;

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

function approve(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to approve this ads?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/approve/${id}`,
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

function reject(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to reject this ads?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/reject/${id}`,
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

function suspend(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to suspend this ads?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/suspend/${id}`,
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

$(function () {
   // on document ready
   // selectRole()
   setupEventHandler();
   search();
});
