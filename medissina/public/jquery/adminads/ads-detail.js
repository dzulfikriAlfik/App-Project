$(document).ready(function () {
   //
});
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

function reload() {
   window.location.reload(true);
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
