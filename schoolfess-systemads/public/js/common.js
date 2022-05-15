// list vars
let primaryColor = "#FC0101";
let secondaryColor = "#aab0bc";

const swalInstance = Swal.mixin({
   customClass: {
      confirmButton: "btn btn-primary btn-confirm",
      cancelButton: "btn btn-light btn-cancel",
      container: "swal-jdih",
   },
   buttonsStyling: false,
});

const toastInstance = Swal.mixin({
   toast: true,
   position: "top-end",
   showConfirmButton: false,
   timer: 3000,
});

class CommonJS {
   numberFormat(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   }
   swalError(message, callback) {
      swalInstance
         .fire({
            title: "Oops!",
            text: message,
            width: "400px",
            confirmButtonText: "Ok",
         })
         .then(function () {
            if (callback) {
               callback();
            }
         });
   }
   swalOk(message, callback) {
      swalInstance
         .fire({
            title: "Yeay!",
            text: message,
            width: "400px",
            confirmButtonText: "Ok",
         })
         .then(function () {
            callback();
         });
   }

   swalConfirm(message, confirmText, denyText, callback) {
      swalInstance
         .fire({
            title: "Confirmation",
            text: message,
            width: "400px",
            confirmButtonText: confirmText,
            showCancelButton: true,
            cancelButtonText: denyText,
            reverseButtons: true,
         })
         .then((result) => {
            if (result.isConfirmed) {
               callback();
            }
         });
   }

   swalConfirmAjax(message, confirmText, denyText, ajaxMethod, url, callback) {
      swalInstance
         .fire({
            title: "Confirmation",
            text: message,
            width: "400px",
            confirmButtonText: confirmText,
            showCancelButton: true,
            closeOnConfirm: false,
            cancelButtonText: denyText,
            reverseButtons: true,
            showLoaderOnConfirm: true,
            preConfirm: async () => {
               return await ajaxMethod(url, callback);
            },
            allowOutsideClick: () => !Swal.isLoading(),
         })
         .then((result) => {
            // if (result.isConfirmed) {
            //     callback()
            // }
         });
   }

   toastRequired(field) {
      toastInstance.fire({
         icon: "error",
         title: `${field} cannot empty!`,
      });
   }

   toastSuccess(message) {
      toastInstance.fire({
         icon: "success",
         title: message,
      });
   }

   toastError(message) {
      toastInstance.fire({
         icon: "error",
         title: message,
      });
   }

   loading(state) {
      if (state) $("#loading").show();
      else $("#loading").hide();

      this.disableAllInput(state);
   }

   disableAllInput(state) {
      $("input[type='text']").prop("disabled", state);
      $("input[type='email']").prop("disabled", state);
      $("input[type='button']").prop("disabled", state);
      $("input[type='submit']").prop("disabled", state);
      $("input[type='checkbox']").prop("disabled", state);
      $("textarea").prop("disabled", state);
      $("select").prop("disabled", state);
      $("button").prop("disabled", state);
   }

   showErrorMessage(selectorId, msg) {
      $(selectorId).append(
         "<div id='errorMsg' class='error-msg'>" + msg + "</div>"
      );
   }

   clearMessage(selectorId, msg) {
      $("#errorMsg").parent().html("");
   }

   handleResponse(response, callback) {
      if (response.error) {
         // show first error
         commonJS.swalError(response.error[Object.keys(response.error)[0]][0]);
      }

      if (callback) callback(response);
      else commonJS.swalError("Unexpected result.");
   }

   buildPagination(data) {
      let currentPage = data.current_page;
      let totalPage = data.last_page;

      let pagination = ``;
      pagination += `<select class="form-select" id="selectPage">`;
      for (let i = 1; i <= totalPage; i++) {
         let selected = "";
         i == currentPage ? (selected = "selected") : (selected = "");
         pagination += `
            <option value="${i}" ${selected}>Page ${i}</option>
         `;
      }
      pagination += "</select>";
      return pagination;
   }

   buildTableInfo(data) {
      let info = "";
      info += `
         Showing <b>${data.from}</b> - <b>${data.to}</b> from <b>${data.total}</b> data.
         <br/>
         Total <b>${data.last_page}</b> page.
      `;
      return info;
   }

   getUrlParameter(sParam) {
      let sPageURL = window.location.search.substring(1),
         sURLVariables = sPageURL.split("&"),
         sParameterName,
         i;

      for (i = 0; i < sURLVariables.length; i++) {
         sParameterName = sURLVariables[i].split("=");

         if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined
               ? true
               : decodeURIComponent(sParameterName[1]);
         }
      }
      return false;
   }

   // get value from localstorage
   getLStorage(name) {
      let value;
      value = localStorage.getItem(name);
      return value;
   }

   // function format number
   formatNumber(value) {
      return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
   }
}

const commonJS = new CommonJS();
