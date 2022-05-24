$(function () {
   // on document ready
});

function save() {
   ads_title = $("#ads_title").val();
   ads_desc = $("#ads_desc").val();
   ads_link = $("#ads_link").val();
   ads_placement = $("#ads_placement").val();
   let data = {
      ads_title: ads_title,
      ads_desc: ads_desc,
      ads_link: ads_link,
      ads_placement: ads_placement,
   };
   commonAPI.putAPI(
      "/api/ads/put/" + $("#ads_id").val(),
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
