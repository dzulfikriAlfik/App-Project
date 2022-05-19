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
         <td>${data[index].user_name} <br/>
            <span style='color: #b1b1b1'>@${data[index].user_username}</span>
         </td>
         <td>${data[index].user_email} <br/>
            <span style='color: #b1b1b1'>${data[index].user_phone}</span>
         </td>
         <td>${data[index].user_company} <br/>
            <span style='color: #b1b1b1'>${data[index].user_company_type}</span>
         </td>
         <td>${data[index].user_status == 1 ? "Active" : "Pending"}</td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="partner-active">${checkPartnerActive(
                     data[index].user_status,
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

function checkPartnerActive(user_status, user_id) {
   let rowsBanned = "";
   if (user_status == 0) {
      rowsBanned += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='activate(\"${user_id}\")'><i class='fa fa-check feather-16'></i> activate
         </button>
      `;
   } else {
      rowsBanned += `
         <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='pending(\"${user_id}\")'><i class='fa fa-ban feather-16'></i> Block
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
   $("#filterCompany").val("");
   $("#filterCompanyType").val("");
   $("#filterStatus").val("");
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
   let url = "/api/user/get_partner?page=" + page;

   let filterName = $("#filterName").val();
   let filterUsername = $("#filterUsername").val();
   let filterEmail = $("#filterEmail").val();
   let filterCompany = $("#filterCompany").val();
   let filterCompanyType = $("#filterCompanyType").val();
   let filterStatus = $("#filterStatus").val();
   let params = `&user_username=${filterUsername}&user_email=${filterEmail}&user_name=${filterName}&user_company=${filterCompany}&user_company_type=${filterCompanyType}&user_status=${filterStatus}`;

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

function activate(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to activate this partner?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/user/activate/${id}`,
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

function pending(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to block this user?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/user/pending/${id}`,
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
