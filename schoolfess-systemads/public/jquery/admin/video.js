var globalPage = 1;
function setupEventHandler() {
   $(".filter input").keypress(function (event) {
      if (event.keyCode == 13) {
         search(1);
      }
   });

   $(".modal input").keypress(function (event) {
      if (event.keyCode == 13) {
         save();
      }
   });
}

/* ------------------------- Function buildTemplate ------------------------- */
function buildTemplate(data, index, page, perPage) {
   let rows = `
   <tr class='template-data'>
      <td style='text-align: center'>${
         parseInt(perPage * (page - 1)) + parseInt(index) + 1
      }</td>
      <td>
         <img style='width:150px !important; height:auto !important; border-radius:0px !important;' src='/api/video/download/${
            data[index].video_id
         }'/>
      </td>
      <td>${data[index].video_title}</td>
      <td>${data[index].video_link}</td>
      <td>
         <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='edit(\"${
                  data[index].video_id
               }\")' style='margin-right: 5px;'><i class='fa fa-pencil feather-16'></i> Edit
               </button>
               <button type='button' class='btn btn-light btn-xs  dropdown-item' onClick='destroy(\"${
                  data[index].video_id
               }\")'><i class='fa fa-trash feather-16'></i> Delete
               </button>
            </div>
         </div>
      </td>
   </tr>
   `;

   return rows;
}
/* ------------------------- End Function buildTemplate ------------------------- */

/* -------------------------- Function clear filter ------------------------- */
function clearFilter() {
   $("#filterTitle").val("");
   $("#filterLink").val("");
   $("#filterSubject").val("");
   globalPage = 1;
   search();
}
/* -------------------------- End Function clear filter ------------------------- */

/* --------------------------- Function setUpInfo --------------------------- */
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
/* --------------------------- End Function setUpInfo --------------------------- */

/* ----------------------------- Function Search ---------------------------- */
function search(page) {
   if (!page) page = globalPage;
   var url = "/api/video/get?page=" + page;

   var filterTitle = $("#filterTitle").val();
   var filterLink = $("#filterLink").val();
   var filterSubject = $("#filterSubject").val();
   var params =
      "&video_title=" +
      filterTitle +
      "&video_link=" +
      filterLink +
      "&video_subject=" +
      filterSubject;

   $(".template-data").remove();
   commonJS.loading(true);
   commonAPI.getAPI(url + params, (response) => {
      if (response.status == 200) {
         // refine structure
         var structure = response.data;
         var data = structure.data;

         // force search from page 1
         if (data.length == 0 && structure.current_page != 1) {
            globalPage = 1;
            search();
            return;
         }

         var rows = "";
         if (data.length == 0) {
            $("#nodata").show();
         } else {
            $("#nodata").hide();
         }
         for (var index in data) {
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
/* ----------------------------- End Function Search ---------------------------- */

/* ------------------------------ Function Add ------------------------------ */
function add() {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Video Data");
}
/* ------------------------------ End Function Add ------------------------------ */

/* ------------------------------ Function Save ----------------------------- */
function save() {
   commonJS.clearMessage();
   if ($("#video_title").val() == "") {
      $("#video_title").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Video Title"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#video_desc").val() == "") {
      $("#video_desc").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Video Description"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#video_link").val() == "") {
      $("#video_link").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Video Link"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if ($("#video_source").val() == "") {
      $("#video_source").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Video Source"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   // if (!matchYoutubeUrl($("#video_source").val())){
   //    $("#video_source").focus();
   //    commonJS.showErrorMessage(
   //       "#msgBox",
   //       commonMsg.getMessage(["Video Source"], "Link is not from YouTube.")
   //    );
   //    return;
   // }

   if ($("#video_subject").val() == "") {
      $("#video_subject").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Video Subject"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   commonJS.loading(true);

   // harus kaya gini, kalau langsung ke jquery ga kedeteksi
   // var data
   let video_title = $("#video_title").val();
   let video_desc = $("#video_desc").val();
   let video_link = $("#video_link").val();
   let video_source = $("#video_source").val();
   let video_subject = $("#video_subject").val();
   let video_thumbnail = $("#video_thumbnail")[0].files[0];

   // form data
   var data = new FormData();
   data.append("video_title", video_title);
   data.append("video_desc", video_desc);
   data.append("video_link", video_link);
   data.append("video_source", video_source);
   data.append("video_subject", video_subject);
   data.append("video_thumbnail", video_thumbnail);

   if ($("#video_id").val() == "") {
      if ($("#video_thumbnail").val() == "") {
         $("#video_thumbnail").focus();
         commonJS.showErrorMessage(
            "#msgBox",
            commonMsg.getMessage(["Video Thumbnail"], commonMsg.MSG_REQUIRED)
         );
         return;
      }

      commonAPI.postFormDataAPI(
         "/api/video/create",
         data,
         function (response) {
            if (!response.error) {
               search();
               $("#modalForm").modal("hide");
            }
            commonJS.loading(false);
         },
         function (response) {
            commonJS.loading(false);
            commonJS.swalError(response.responseJSON.message);
         }
      );
   } else {
      // put ga bisa form data
      commonAPI.postFormDataAPI(
         "/api/video/update/" + $("#video_id").val(),
         data,
         function (response) {
            if (!response.error) {
               search();
               $("#modalForm").modal("hide");
            }
            commonJS.loading(false);
         },
         function (response) {
            commonJS.loading(false);
            commonJS.swalError(response.responseJSON.message);
         }
      );
   }
}
/* ------------------------------ End Function Save ----------------------------- */

/* ------------------------------ Function Edit ----------------------------- */
function edit(id) {
   $("#modalForm").modal("show");
   $("#modalLabel").text("Edit Video Data");
   commonJS.loading(true);
   commonAPI.getAPI(`/api/video/get/${id}`, (response) => {
      if (response.status == 200) {
         $("#video_id").val(response.data.video_id);
         $("#video_title").val(response.data.video_title);
         $("#video_desc").val(response.data.video_desc);
         $("#video_link").val(response.data.video_link);
         $("#video_source").val(response.data.video_source);
         $("#video_subject").val(response.data.video_subject);
         // $("#video_thumbnail").val(response.data.video_thumbnail);
         // $("#video_views").val(response.data.video_views);
         commonJS.loading(false);
      } else if (response.status == 401) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   });
}
/* ------------------------------ End Function Edit ----------------------------- */

/* ----------------------------- Function Delete ---------------------------- */
function destroy(id) {
   commonJS.swalConfirmAjax(
      "Are you sure you want to delete this data?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/video/delete/${id}`,
      function (response) {
         if (response.status == 200) {
            search(globalPage);
         } else if (response.status == 401) {
            swalError(response.message);
         }
         commonJS.loading(false);
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
/* ----------------------------- End Function Delete ---------------------------- */

/* ---------------------- clear value when modal close ---------------------- */
$(".modal").on("hidden.bs.modal", function () {
   $("#video_id").val("");
   $("#video_title").val("");
   $("#video_desc").val("");
   $("#video_link").val("");
   $("#video_source").val("youtube");
   $("#video_subject").val("");
   $("#video_thumbnail").val("");
   $("#video_views").val("");
   hideImage();
});

function matchYoutubeUrl(url) {
   var p =
      /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
   if (url.match(p)) {
      return url.match(p)[1];
   }
   return false;
}

function previewImage() {
   const image = document.querySelector("#video_thumbnail");
   const imgPreview = document.querySelector(".img-preview");

   imgPreview.style.display = "block";

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);

   oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
   };
}

function hideImage() {
   $(".img-preview").hide();
}

/* ---------------------------- on document ready --------------------------- */
$(function () {
   setupEventHandler();
   search();
});
