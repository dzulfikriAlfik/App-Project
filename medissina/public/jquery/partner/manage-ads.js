let globalPage = 1;

// on document ready
$(function () {
   setupEventHandler();
   search();

   $("#adsStartDate").datetimepicker({
      //
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
   });
   $("#adsEndDate").datetimepicker({
      //
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
   });
});
let isUpload = $("#croppingImage").attr("data-isUpload");
let showAllInput = true;
let sisaSaldo = 0;
let totalPrice = 0;
let getRatio = 0;
let userPoint = 0;

function setRatio(input) {
   getRatio = input;
}

function setPoint(input) {
   userPoint = input;
}

// function action button enter
function setupEventHandler() {
   $(".filter input").keypress(function (event) {
      if (event.keyCode == 13) {
         search(1);
      }
   });
}

function search(page) {
   if (!page) page = globalPage;
   let url = `/api/ads/partner_ads?page=${page}`;

   let filterAdsTitle = $("#filterAdsTitle").val();
   let filterPlacement = $("#filterPlacement").val();
   let filterCreatedAt = $("#filterCreatedAt").val();
   let filterAdsStatus = $("#filterAdsStatus").val();
   let params = `&ads_title=${filterAdsTitle}&ads_placement=${filterPlacement}&created_dt=${filterCreatedAt}&ads_status=${filterAdsStatus}`;

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
            ${checkAdsStatus(data[index].ads_status)}<br/>
            <span style="color:#b1b1b1">Credit : ${
               data[index].ads_quantity
            }</span>
         </td>
         <td>
            <div class="dropdown">
               <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                  Action
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <div class="partner-active">
                     ${approveAds(data[index].ads_status, data[index].ads_id)}
                  </div>
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='updateCredit(\"${
                     data[index].ads_id
                  }\",
                  \"${data[index].ads_type}\",
                  \"${data[index].ads_quantity}\")'>
                     <i class='fa fa-plus feather-16'></i> Update Credit
                  </button>
                  <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='deleteAds(\"${
                     data[index].ads_id
                  }\")'><i class='fa fa-trash feather-16'></i> Delete
                  </button>
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
   } else if (ads_status == 3) {
      return "Suspended";
   } else {
      return "Paused";
   }
}

function approveAds(ads_status, ads_id) {
   let rowsApproveAds = "";
   if (ads_status == 0 || ads_status == 1 || ads_status == 4) {
      // if pending or approved
      rowsApproveAds += `
         <a href="/cms/ads_edit/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-edit feather-16'></i> Edit
         </a>
         <a href="/cms/show_ads_detail/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-eye feather-16'></i> Show Detail
         </a>
      `;
      if (ads_status == 1) {
         rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='pauseAds(\"${ads_id}\")'><i class='fa fa-pause feather-16'></i> Pause
         </button>
      `;
      }
      if (ads_status == 4) {
         rowsApproveAds += `
         <button type='button' class='btn btn-light btn-xs style="margin-right: 5px;" dropdown-item' onClick='resumeAds(\"${ads_id}\")'><i class='fa fa-play feather-16'></i> Resume
         </button>
      `;
      }
   } else if (ads_status == 2 || ads_status == 3) {
      // if rejected & suspended
      rowsApproveAds += `
         <a href="/cms/show_ads_detail/${ads_id}" class='btn btn-light btn-xs  dropdown-item'><i class='fa fa-flag feather-16'></i> See why?
         </a>
      `;
   }
   return rowsApproveAds;
}

function deleteAds(id) {
   commonJS.swalConfirmAjax(
      "Apakah anda yakin menghapus iklan ini? ini tidak akan mengembalikan saldo anda",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/destroy/${id}`,
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

function pauseAds(id) {
   commonJS.swalConfirmAjax(
      "Apakah anda yakin menghentikan sementara penayangan iklan ini?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/pause/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("Data paused successfully");
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

function resumeAds(id) {
   commonJS.swalConfirmAjax(
      "Apakah anda yakin melanjutkan penayangan iklan ini?",
      "Yes",
      "No",
      commonAPI.deleteAPI,
      `/api/ads/resume/${id}`,
      function (response) {
         commonJS.loading(false);
         if (response.status == 200) {
            commonJS.swalOk("Data resume successfully");
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

// clear value filter search
function clearFilter() {
   $("#filterAdsTitle").val("");
   $("#filterPlacement").val("");
   $("#filterCreatedAt").val("");
   $("#filterAdsStatus").val("");
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

// this add function is calling cropper library
function add(aspectRatioInput) {
   getUserPoint();
   $("#est_price").attr("disabled", true);
   $("#modalForm").modal("show");
   $("#modalLabel").text("Add Ads Data");
   var croppingImage = document.querySelector("#croppingImage"),
      img_w = document.querySelector(".img-w"),
      dwn = document.querySelector(".download"),
      cropBtn = document.querySelector(".crop"),
      croppedImg = document.querySelector(".cropped-img"),
      upload = document.querySelector("#cropperImageUpload"),
      cropper = "";

   $(".file-upload-browse").on("click", function (e) {
      var file = $(this)
         .parent()
         .parent()
         .parent()
         .find(".file-upload-default");
      file.trigger("click");
   });

   $(".crop").attr("disabled", true);

   cropper = new Cropper(croppingImage, {
      aspectRatio: aspectRatioInput,
   });

   $("#ads_type").on("change", function () {
      let id = $("#ads_type").val();
      commonAPI.getAPI(`/api/ads_type/get/${id}`, (response) => {
         if (response.status == 200) {
            // refine structure
            let data = response.data;
            // check if platform is twitter then don't fill all form
            if (data.ads_platform_name == "Twitter") {
               hideSomeInputs();
            } else {
               showAllInputs();
            }
            // check if ads_type_used is perpost then qty input disabled and force fill with 1
            if (data.ads_type_used == "perpost") {
               $("#ads_quantity").attr("disabled", true);
               $("#ads_quantity").val(1);
            } else {
               $("#ads_quantity").attr("disabled", false);
            }
            // get ratio and set for cropper
            let ratio = data.ads_type_width / data.ads_type_height;

            setRatio(ratio);

            cropper.destroy();
            cropper = new Cropper(croppingImage, {
               aspectRatio: ratio,
            });

            // get price, calculate total price
            calculatePrice(
               data.ads_type_price,
               $("#ads_quantity").val(),
               "#est_price",
               "#infoSisaSaldo"
            );

            // on change ads_quantity
            $("#ads_quantity").on("change keyup", function () {
               // get price, calculate total price
               calculatePrice(
                  data.ads_type_price,
                  $("#ads_quantity").val(),
                  "#est_price",
                  "#infoSisaSaldo"
               );
            });
         } else if (response.status == 401) {
            commonJS.swalError(response.message, function () {
               window.location = "/logout";
            });
         }
      });
   });

   // when partner upload an image
   upload.addEventListener("change", function (e) {
      $(this)
         .parent()
         .find(".form-control")
         .val(
            $(this)
               .val()
               .replace(/C:\\fakepath\\/i, "")
         );
      if (e.target.files.length) {
         cropper.destroy();
         // start file reader
         const reader = new FileReader();
         reader.onload = function (e) {
            if (e.target.result) {
               croppingImage.src = e.target.result;
               getRatio == 0
                  ? (uploadRatio = aspectRatioInput)
                  : (uploadRatio = getRatio);
               cropper = new Cropper(croppingImage, {
                  aspectRatio: uploadRatio,
               });
            }
            // set isUpload to true meaning partner is uploaded an image
            isUpload = "true";
            $(".crop").attr("disabled", false);
         };
         reader.readAsDataURL(e.target.files[0]);
      }
   });

   // button crop on click
   cropBtn.addEventListener("click", function (e) {
      e.preventDefault();
      // get result to data uri
      let imgSrc = cropper
         .getCroppedCanvas({
            // width: img_w.value, // input value
            width: 500,
         })
         .toDataURL();
      croppedImg.src = imgSrc;
   });
}

function calculatePrice(priceInput, ads_qty, priceElem, saldoElem) {
   // get price, calculate total price
   let price = parseInt(priceInput);
   totalPrice = parseInt(price * ads_qty);
   sisaSaldo = parseInt(userPoint - totalPrice);
   // append to est_price id
   let infoSisaSaldo = $(saldoElem);
   if (ads_qty) {
      if (sisaSaldo < 0) {
         $(priceElem).val(`Rp${commonJS.formatNumber(totalPrice)},-`);
         infoSisaSaldo.html(
            `Maaf saldo anda tidak mencukupi, anda kurang Rp${commonJS.formatNumber(
               sisaSaldo
            )},-`
         );
         infoSisaSaldo.addClass("text-danger");
         $("#tombolSave").prop("disabled", true);
         $("#tombolSaveExt").prop("disabled", true);
      } else {
         $(priceElem).val(`Rp${commonJS.formatNumber(totalPrice)},-`);
         infoSisaSaldo.html(
            `estimasi sisa saldo anda : Rp${commonJS.formatNumber(sisaSaldo)},-`
         );
         infoSisaSaldo.removeClass("text-danger");
         infoSisaSaldo.addClass("text-info");
         $("#tombolSave").prop("disabled", false);
         $("#tombolSaveExt").prop("disabled", false);
      }
   } else {
      infoSisaSaldo.html("");
      $(priceElem).val(`Rp0,-`);
   }
}

function getUserPoint() {
   $.ajax({
      url: `/api/user/get_saldo/${localStorage.getItem("id_user")}`,
      headers: {
         Authorization: "Bearer " + localStorage.getItem("token"),
         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
         "Content-Type": "application/json",
      },
      method: "GET",
      dataType: "JSON",
      success: function (response) {
         if (response.status == 200) {
            setPoint(response.user_point);
         } else if (response.status == 401) {
            commonJS.swalError(response.message, function () {
               localStorage.clear();
               window.location = "/logout";
            });
         }
      },
      error: function (response) {
         commonJS.swalError(response.responseJSON.message);
      },
   });
}

function hideSomeInputs() {
   showAllInput = false;
   $("#inputTitle").hide();
   $("#inputDesc").hide();
   $("#inputPlacement").hide();
   $("#inputImage").hide();
}

function showAllInputs() {
   showAllInput = true;
   $("#inputTitle").show();
   $("#inputDesc").show();
   $("#inputPlacement").show();
   $("#inputImage").show();
}

// function save is called when user clicked save button in the modal
function save() {
   let ads_title = $("#ads_title").val();
   let ads_desc = $("#ads_desc").val();
   let ads_placement = $("#ads_placement").val();
   let ads_link = $("#ads_link").val();
   let ads_type = $("#ads_type").val();
   let ads_qty = $("#ads_quantity").val();
   let ads_start_date = $("#ads_start_date").val();
   let ads_end_date = $("#ads_end_date").val();
   let ads_image = $("#cropped_image").attr("src");

   // meaning that type is not twitter
   if (showAllInput == true) {
      if (ads_title == "") {
         $("#ads_title").focus();
         commonJS.showErrorMessage(
            "#msgBox",
            commonMsg.getMessage(["Ads Title"], commonMsg.MSG_REQUIRED)
         );
         return;
      }

      if (ads_desc == "") {
         $("#ads_desc").focus();
         commonJS.showErrorMessage(
            "#msgBox",
            commonMsg.getMessage(["Ads Description"], commonMsg.MSG_REQUIRED)
         );
         return;
      }

      if (ads_placement == "") {
         $("#ads_placement").focus();
         commonJS.showErrorMessage(
            "#msgBox",
            commonMsg.getMessage(["Ads Placement"], commonMsg.MSG_REQUIRED)
         );
         return;
      }

      if (ads_image == "") {
         commonJS.swalError(
            "Panduan upload gambar : Harap klik upload untuk memilih gambar terlebih dahulu, lalu klik crop"
         );
         return;
      }

      if (isUpload == "false") {
         commonJS.swalError(
            "Panduan upload gambar : Harap klik upload untuk memilih gambar terlebih dahulu, lalu klik crop"
         );
         return;
      }
   } else {
      // meaning type is twitter
      ads_title = "null";
      ads_desc = "null";
      ads_placement = "null";
   }

   if (ads_type == "") {
      $("#ads_type").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Type"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if (ads_link == "") {
      $("#ads_link").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Link"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if (ads_qty == "") {
      $("#ads_qty").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Ads Quantity"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if (ads_start_date == "") {
      $("#ads_start_date").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Iklan Mulai"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if (ads_end_date == "") {
      $("#ads_end_date").focus();
      commonJS.showErrorMessage(
         "#msgBox",
         commonMsg.getMessage(["Iklan Selesai"], commonMsg.MSG_REQUIRED)
      );
      return;
   }

   if (
      commonJS.getUnixTimeStamp(ads_start_date) >=
      commonJS.getUnixTimeStamp(ads_end_date)
   ) {
      commonJS.swalError("Iklan selesai harus lebih baru dari iklan mulai");
      return;
   }

   commonJS.clearMessage();

   commonJS.loading(true);

   let data = {
      ads_title: ads_title,
      ads_desc: ads_desc,
      ads_placement: ads_placement,
      ads_link: ads_link,
      ads_type: ads_type,
      ads_qty: parseInt(ads_qty),
      ads_image: ads_image,
      ads_start_date: ads_start_date,
      ads_end_date: ads_end_date,
   };

   // console.log(data);

   // All input is valid, ready to send request post ads
   commonAPI.postWithImageBase64API(
      "/api/ads/create",
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk(
            "Data iklan berhasil disimpan. Status iklan anda akan menjadi pending dan akan kami review. Terimakasih",
            function () {
               // search();
               $("#modalForm").modal("hide");
            }
         );
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
         $("#est_price").prop("disabled", true);
      }
   );
}

function updateCredit(id_ads, ads_type, ads_qty) {
   getUserPoint();
   $("#est_price_ext").attr("disabled", true);
   $("#extendAdsQty").attr("disabled", true);
   $("#modalFormCredit").modal("show");
   $("#modalLabelCredit").text("Add Credit");
   $("#extendAdsId").val(id_ads);
   $("#extendAdsQty").val(ads_qty);
   // // $("#extend_ads_qty").val(ads_qty);
   // let quantity_db = $("#extendAdsQty").val();
   commonAPI.getAPI(`/api/ads_type/get/${ads_type}`, (response) => {
      if (response.status == 200) {
         // refine structure
         let data = response.data;

         // on change ads_quantity
         $("#extend_ads_qty").on("change keyup", function () {
            // get price, calculate total price
            let quantity = $("#extend_ads_qty").val();

            if (parseInt(quantity) < 0) {
               $("#extend_ads_qty").val(0);
               quantity = 0;
            }
            calculatePrice(
               data.ads_type_price,
               quantity,
               "#est_price_ext",
               "#infoSisaSaldoExt"
            );
         });
      } else if (response.status == 401) {
         commonJS.swalError(response.message, function () {
            window.location = "/logout";
         });
      }
   });

   // onclick save in add credit modal
   $("#tombolSaveExt").on("click", function () {
      let extend_ads_qty = $("#extend_ads_qty").val();
      extend(id_ads, extend_ads_qty, ads_type);
   });
}

function extend(id_ads, ads_qty, ads_type) {
   if (ads_qty == 0 || ads_qty == "" || ads_qty == null) {
      commonJS.swalError("Credit tidak boleh kosong");
      return;
   }

   let data = {
      ads_id: id_ads,
      ads_type: ads_type,
      qty_added: ads_qty,
   };
   console.log(data);
   commonAPI.putAPI(
      `/api/ads/update_qty/${id_ads}`,
      data,
      function (response) {
         commonJS.loading(false);
         commonJS.swalOk("Data berhasil diubah", function () {
            search();
            $("#modalFormCredit").modal("hide");
         });
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
         $("#est_price_ext").prop("disabled", true);
      }
   );
}
// clear value when modal close
$(".modal").on("hidden.bs.modal", function () {
   commonJS.clearAllInput();
   $("#upload_image").val("");
   $("#cropped_image").attr("src", "");
   $("#cropperImageUpload").val("");
   $("#ads_start_date").val(new Date());
   $("#ads_end_date").val(new Date());
   showAllInputs();
   isUpload = "false";
   // if user not upload an image when modal open, then no need to refresh. otherwise the opposite
   if (croppingImage.src != firstImageLocation) {
      window.location.reload(true);
   }
});

// Declared global variable

// API Call

// DOM Manipulation
