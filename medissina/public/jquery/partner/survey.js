$(function () {
   // commonJS.swalOk("Welcome to survey page");

   let curDate = moment(new Date());

   $("#suveryStartDate").datetimepicker({
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
   });
   $("#suveryEndDate").datetimepicker({
      format: "Y-MM-DD HH:mm",
      useCurrent: false,
      defaultDate: new Date(),
      minDate: moment(),
   });
});

let checkboxAudience = document.querySelectorAll(".audience-list");
let arrListAudience = [];

for (let checkbox of checkboxAudience) {
   checkbox.addEventListener("click", function () {
      if (this.checked == true) {
         arrListAudience.push(this.value);
      } else {
         arrListAudience = arrListAudience.filter((e) => e !== this.value);
      }
   });
}

function validate() {
   let data = {
      survey_title: $("#survey-title").val(),
      survey_desc: $("#survey-desc").val(),
      total_audience: $("#total-audience").val(),
      survey_start_date: $("#survey-start-date").val(),
      survey_end_date: $("#survey-end-date").val(),
      list_audience: arrListAudience,
   };
   if (data.survey_title == "") {
      commonJS.swalError("Survey title tidak boleh kosong", function () {});
      $("#survey-title").focus();
      return false;
   }
   if (data.survey_desc == "") {
      commonJS.swalError("Survey deskripsi tidak boleh kosong", function () {});
      $("#survey-desc").focus();
      return false;
   }
   if (data.total_audience == "") {
      commonJS.swalError("Total audience tidak boleh kosong", function () {});
      $("#total-audience").focus();
      return false;
   }
   if (data.survey_start_date == "") {
      commonJS.swalError(
         "Survey start date tidak boleh kosong",
         function () {}
      );
      $("#survey-start-date").focus();
      return false;
   }
   if (data.survey_end_date == "") {
      commonJS.swalError("Survey end date tidak boleh kosong", function () {});
      $("#survey-end-date").focus();
      return false;
   }
   if (data.list_audience.length < 1) {
      commonJS.swalError(
         "Pilih setidaknya satu target audience",
         function () {}
      );
      return false;
   }
   // if all data is validate
   return data;
}

function save() {
   // run validate function
   validate();

   if (validate() !== false) {
      let data = validate();

      commonJS.loading(true);

      // console.log(data);

      commonAPI.postAPI(
         "/api/survey/create",
         data,
         function (response) {
            commonJS.loading(false);
            commonJS.swalOk(response.message, function () {
               console.log(response);
               window.location.href = `/cms/kuesioner/${response.survey_id}`;
            });
         },
         function (response) {
            commonJS.loading(false);
            commonJS.swalError(response.responseJSON.message);
         }
      );
   }
}
