/* -------------------------------------------------------------------------- */
/*                          Declared global variable                          */
/* -------------------------------------------------------------------------- */
let globalPage = 1;

/* -------------------------------------------------------------------------- */
/*                                 Functions                                  */
/* -------------------------------------------------------------------------- */
// on ready
$(function () {
   setupEventHandler();
   search();

   $("#expired-date").datetimepicker({
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
   });
});
// function action button enter
function setupEventHandler() {
   $(".filter input").keypress(function (event) {
      if (event.keyCode == 13) {
         search(1);
      }
   });
}
// append ke table
function buildTemplate(data, index, page, perPage) {
   let rows = `
      <tr class='template-data'>
         <td style='text-align: center'>
            ${parseInt(perPage * (page - 1)) + parseInt(index) + 1}
         </td>
         <td>${data[index].voucher_name}<br/>
            <span style="color:#b1b1b1">Code : ${
               data[index].voucher_code
            }</span>
         </td>
         <td class="text-center">${amountType(
            data[index].voucher_amount,
            data[index].voucher_amount_type
         )}</td>
         <td class="text-center">${data[index].voucher_type.toUpperCase()}</td>
         <td class="text-center">
            ${data[index].voucher_quantity}<br/>
            <span style="color:#b1b1b1">Used : ${
               data[index].voucher_used
            }</span>
         </td>
         <td>
            ${data[index].voucher_created}<br/>
            <span style="color:#b1b1b1">Expired : ${
               data[index].voucher_expired
            }</span>
         </td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  ${amountStatus(
                     data[index].voucher_id,
                     data[index].voucher_status
                  )}
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='editVoucher(\"${
                     data[index].voucher_id
                  }\")'><i class='fa fa-edit feather-16'></i> Edit
                  </button>
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='deleteVoucher(\"${
                     data[index].voucher_id
                  }\")'><i class='fa fa-trash feather-16'></i> Delete
                  </button>
               </div>
            </div>
         </td>
      </tr>
   `;

   return rows;
}
// cek amount type
function amountType(amount, type) {
   if (type == "percent") {
      return `${amount}%`;
   } else if (type == "fixed") {
      return `Rp${commonJS.formatNumber(amount)}`;
   }
}
// cek status
function amountStatus(id, status) {
   if (status == 0) {
      return `
      <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='activate(\"${id}\")'><i class='fa fa-check feather-16'></i> Activate
      </button>
      `;
   } else {
      return `
      <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='inactive(\"${id}\")'><i class='fa fa-ban feather-16'></i> Inactive
      </button>
      `;
   }
}
// clear value filter search
function clearFilter() {
   $("#filter-voucher-name").val("");
   $("#filter-voucher-type").val("");
   $("#filter-voucher-amount-type").val("");
   globalPage = 1;
   search();
}
// pagination info
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
// open modal when add button clicked
function add() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Voucher Data");
}
// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   commonJS.clearAllInput();
});

/* -------------------------------------------------------------------------- */
/*                                  API Call                                  */
/* -------------------------------------------------------------------------- */
// get voucher
function search(page) {
   if (!page) page = globalPage;
   let url = `/api/voucher/get?page=${page}`;

   let filterVoucherName = $("#filter-voucher-name").val();
   let filterVoucherType = $("#filter-voucher-type").val();
   let filterVoucherAmountType = $("#filter-voucher-amount-type").val();
   let params = `&voucher_name=${filterVoucherName}&voucher_type=${filterVoucherType}&voucher_amount_type=${filterVoucherAmountType}`;

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
// edit
function editVoucher(id) {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Edit Voucher Data");
   commonJS.loading(true);
   commonAPI.getAPI(`/api/voucher/get/${id}`, (response) => {
      if (response.status == 200) {
         $("#voucher-id").val(response.data.voucher_id);
         $("#voucher-name").val(response.data.voucher_name);
         $("#voucher-code").val(response.data.voucher_code);
         $("#voucher-desc").val(response.data.voucher_description);
         $("#voucher-amount").val(response.data.voucher_amount);
         $("#voucher-amount-type").val(response.data.voucher_amount_type);
         $("#voucher-type").val(response.data.voucher_type);
         $("#voucher-quantity").val(response.data.voucher_quantity);
         $("#voucher-min-trans").val(response.data.voucher_min_trans);
         $("#voucher-exp-date").val(response.data.voucher_expired);
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   });
}
// create or update data
function save() {
   // var data
   let voucherId = $("#voucher-id").val();
   let voucherName = $("#voucher-name").val();
   let voucherCode = $("#voucher-code").val();
   let voucherDesc = $("#voucher-desc").val();
   let voucherAmount = $("#voucher-amount").val();
   let voucherAmountType = $("#voucher-amount-type").val();
   let voucherType = $("#voucher-type").val();
   let voucherQuantity = $("#voucher-quantity").val();
   let voucherMinTrans = $("#voucher-min-trans").val();
   let voucherExpDate = $("#voucher-exp-date").val();

   commonJS.clearMessage();

   // validation
   if (voucherName == "") {
      $("#voucher-name").focus();
      commonJS.swalError("Voucher name is required");
      return;
   }
   if (voucherCode == "") {
      $("#voucher-code").focus();
      commonJS.swalError("Voucher code is required");
      return;
   }
   if (voucherDesc == "") {
      $("#voucher-desc").focus();
      commonJS.swalError("Voucher Description is required");
      return;
   }
   if (voucherAmount == "") {
      $("#voucher-amount").focus();
      commonJS.swalError("Voucher Amount is required");
      return;
   }
   if ($.isNumeric(voucherAmount) == false) {
      $("#voucher-amount").focus();
      $("#voucher-amount").val("");
      commonJS.swalError("Voucher Amount should be integer");
      return;
   }
   if (voucherAmountType == "") {
      $("#voucher-amount-type").focus();
      commonJS.swalError("Voucher Amount type is required");
      return;
   }
   if (voucherAmountType == "percent" && voucherAmount > 100) {
      $("#voucher-amount-type").focus();
      commonJS.swalError(
         "Jika type amount percent, voucher amount tidak boleh lebih dari 100"
      );
      return;
   }
   if (voucherType == "") {
      $("#voucher-type").focus();
      commonJS.swalError("Voucher Type is required");
      return;
   }
   if (voucherQuantity == "") {
      $("#voucher-quantity").focus();
      commonJS.swalError("Voucher Quantity is required");
      return;
   }
   if ($.isNumeric(voucherQuantity) == false) {
      $("#voucher-quantity").focus();
      $("#voucher-quantity").val("");
      commonJS.swalError("Voucher Quantity should be integer");
      return;
   }
   if (voucherMinTrans == "") {
      $("#voucher-min-trans").focus();
      commonJS.swalError("Minimum Transaction is required");
      return;
   }
   if ($.isNumeric(voucherMinTrans) == false) {
      $("#voucher-min-trans").focus();
      $("#voucher-min-trans").val("");
      commonJS.swalError("Minimum Transaction should be integer");
      return;
   }

   // all input is valid
   commonJS.loading(true);

   let data = {
      voucher_name: voucherName,
      voucher_code: voucherCode,
      voucher_desc: voucherDesc,
      voucher_amount: voucherAmount,
      voucher_amount_type: voucherAmountType,
      voucher_type: voucherType,
      voucher_quantity: voucherQuantity,
      voucher_min_trans: voucherMinTrans,
      voucher_expired: voucherExpDate,
   };

   if (voucherId == "") {
      // console.log(data);
      commonAPI.postAPI(
         "/api/voucher/create",
         data,
         function (response) {
            console.log(response);
            commonJS.loading(false);
            commonJS.swalOk("Data berhasil ditambahkan", function () {
               search();
            });
            $("#modalForm").modal("hide");
         },
         function (response) {
            commonJS.loading(false);
            commonJS.swalError(response.responseJSON.message);
         }
      );
   } else {
      commonAPI.putAPI(
         `/api/voucher/update/${voucherId}`,
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
// delete data
function deleteVoucher(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to delete this voucher?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/voucher/delete/${id}`,
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
// activate
function activate(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to activate this voucher?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/voucher/activate/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("This voucher has been activated successfully");
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
// make inactive
function inactive(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to make this voucher inactive?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/voucher/inactive/${id}`,
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
/* -------------------------------------------------------------------------- */
/*                              DOM Manipulation                              */
/* -------------------------------------------------------------------------- */
