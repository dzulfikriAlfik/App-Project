$(function () {
   //
});

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
            window.location.reload(true);
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
            window.location.reload(true);
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
