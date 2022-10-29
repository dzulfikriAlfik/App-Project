$(function () {
   //
});

// Global Variable

// Inline Event Handler
$("#topup-button").on("click", function () {
   let inputTopUpVal = $("#topup-val").val();
   let inputVoucherCode = $("#voucher-code").val();
   // validate input
   if (inputTopUpVal == "") {
      commonJS.swalError("Input Topup tidak boleh kosong");
      return;
   }
   if ($.isNumeric(inputTopUpVal) == false) {
      $("#topup-val").focus();
      $("#topup-val").val("");
      commonJS.swalError("Input Topup harus berupa angka");
      return;
   }
   let topUpVal = parseInt(inputTopUpVal);
   // cek topup value tidak boleh kurang dari 10.000 atau lebih dari 500.000
   if (topUpVal < 25_000) {
      commonJS.swalError(
         "Jumlah topup tidak boleh kurang dari 25.000",
         function () {
            $("#topup-val").val(25000);
         }
      );
   } else {
      if (inputVoucherCode) {
         checkVoucher(inputVoucherCode, topUpVal);
      } else {
         $("#topup-info").html(showTopupInfo(topUpVal));
      }
   }
});

function checkVoucher(inputVoucherCode, topUpVal) {
   commonAPI.getAPI(
      `/api/voucher/get_by_code?voucher_code=${inputVoucherCode}&topup_val=${topUpVal}`,
      (response) => {
         topUpVal = parseInt($("#topup-val").val());
         if (response.status == 200 && response.data != null) {
            voucher = response.data;
            $("#topup-info").html(showTopupInfo(topUpVal, voucher));
            commonJS.loading(false);
         } else if (response.data == null) {
            commonJS.swalError(response.message);
            $("#topup-info").html(showTopupInfo(topUpVal));
         } else if (response.status == 401) {
            commonJS.loading(false);
            commonJS.swalError(response.responseJSON.message);
         }
      }
   );
}

function showTopupInfo(topupVal, voucher = 0) {
   let rows = `
   <div class="table-responsive p-5">
      <table class="table">
         <tbody>
            <tr id="amount">
               <td class="text-left">Topup Poin</td>
               <td class="text-right">${commonJS.formatNumber(
                  topupVal
               )} Poin</td>
            </tr>
            <tr>
               <td class="text-bold-800 text-left">Platform fee</td>
               <td class="text-bold-800 text-right">Rp${commonJS.formatNumber(
                  2000
               )}</td>
            </tr>
            ${checkTopupVoucher(topupVal, voucher)}
            <tr>
               <td class="text-bold-800 text-left">Total poin yang kamu dapat</td>
               <td class="text-bold-800 text-right">${commonJS.formatNumber(
                  getTotalPoint(topupVal, voucher)
               )} Poin</td>
            </tr>
            <tr class="bg-light">
               <td class="text-bold-800 text-left">Total bayar</td>
               <td class="text-bold-800 text-right">Rp${commonJS.formatNumber(
                  getTotalPayment(topupVal, voucher)
               )}</td>
            </tr>
         </tbody>
      </table>
      <a href="#" id="send-topup-button" class="btn btn-primary mt-3">Kirim</a>
   </div>
   `;
   confirmTopup(
      topupVal,
      getTotalPoint(topupVal, voucher),
      getTotalPayment(topupVal, voucher),
      voucher
   );
   return rows;
}

function checkTopupVoucher(topupVal, voucher) {
   if (voucher == 0) {
      return "";
   } else {
      type = voucher.voucher_type;
      amount_type = voucher.voucher_amount_type;
      if (amount_type == "percent") {
         amount = Math.round(topupVal * (voucher.voucher_amount / 100));
         fStr = "";
         lStr = "%";
      } else if (amount_type == "fixed") {
         amount = commonJS.formatNumber(voucher.voucher_amount);
         fStr = "";
         lStr = "";
      }
      // if (type == "cashback") {
      //    amountType = `+${
      //       fStr + commonJS.formatNumber(voucher.voucher_amount) + lStr
      //    } Poin`;
      // } else if (type == "diskon") {
      //    amountType = `${
      //       fStr + commonJS.formatNumber(voucher.voucher_amount) + lStr
      //    }`;
      // }
      amountType = `${
         fStr + commonJS.formatNumber(voucher.voucher_amount) + lStr
      }`;
      return `
      <tr>
         <td class="text-left">${ucFirst(
            voucher.voucher_type
         )} (${amountType})</td>
         <td class="text-right text-info">${
            type == "cashback"
               ? "+" + commonJS.formatNumber(amount) + " Poin"
               : "- Rp" + commonJS.formatNumber(amount)
         }</td>
      </tr>
      `;
   }
}

function getTotalPoint(topupVal, voucher) {
   if (voucher == 0) {
      return topupVal;
   } else {
      type = voucher.voucher_type;
      amountType = voucher.voucher_amount_type;
      if (amountType == "percent") {
         amount = topupVal * (voucher.voucher_amount / 100);
      } else {
         amount = voucher.voucher_amount;
      }
      if (type == "cashback") {
         return Math.round(parseInt(topupVal) + parseInt(amount));
      } else {
         return topupVal;
      }
   }
}

function getTotalPayment(topupVal, voucher) {
   if (voucher == 0) {
      return topupVal + 2000 - parseInt(voucher);
   } else {
      amountType = voucher.voucher_amount_type;
      if (amountType == "percent") {
         amount = topupVal * (voucher.voucher_amount / 100);
      } else {
         amount = voucher.voucher_amount;
      }
      if (type == "cashback") {
         return topupVal + 2000;
      } else {
         return topupVal + 2000 - parseInt(amount);
      }
   }
}

function confirmTopup(topupVal, totalPoint, totalPayment, voucher = 0) {
   let userId = localStorage.getItem("id_user");
   $("#topup-info").on("click", "#send-topup-button", function () {
      let data = {
         topup_amt: topupVal,
         user_id: userId,
      };
      if (voucher != 0) {
         data.voucher = voucher.voucher_code;
      }
      // console.log(data);
      // konfirmasi swal topup
      swalInstance
         .fire({
            title: `Top Up ${commonJS.formatNumber(totalPoint)} Poin`,
            text: `Konfirmasi Pembelian dengan harga Rp${commonJS.formatNumber(
               totalPayment
            )}`,
            width: "400px",
            confirmButtonText: "Yes",
            showCancelButton: true,
            cancelButtonText: "Cancel",
            reverseButtons: true,
            showLoaderOnConfirm: true,
            preConfirm: () => {
               return commonAPI.postAPI(
                  "/api/user/topup",
                  data,
                  function (response) {
                     if (response.status == 200) {
                        commonJS.swalOk(
                           "Permintaan Topup Berhasil Silahkan lakukan proses pembayaran sesuai dengan instruksi"
                        );
                     } else if (response.status == 400) {
                        commonJS.swalError(response.message);
                     }
                     commonJS.loading(false);
                  },
                  function (response) {
                     let error = JSON.parse(response.responseText);
                     commonJS.swalError(error.error.topup_amt[0]);
                     commonJS.loading(false);
                     // commonJS.swalError(response.responseText.error);
                  }
               );
            },
            allowOutsideClick: () => !Swal.isLoading(),
         })
         .then((result) => {
            // if (result.isConfirmed) {
            //     callback()
            // }
         });
   });
}

function ucFirst(string) {
   return string.charAt(0).toUpperCase() + string.slice(1);
}
