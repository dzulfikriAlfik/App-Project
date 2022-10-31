$(function () {
   //
   checkType(1);
});

function cancel() {
   window.location.href = "/cms/survey";
}

let counter = 1;
function addElementQuest() {
   counter++;

   checkType(counter);

   let questionForm = $("#questions");
   let html = `
   <div class="card col-md-11 mx-auto mt-2" id="q-${counter}">
      <div class="card-body">
         <div class="form-group">
            <label for="question-${counter}"><strong id="label-q-${counter}">Pertanyaan ${counter}</strong></label>
            <input type="text" class="form-control" id="question-${counter}" autocomplete="off" placeholder="Masukkan Pertanyaan">
         </div>
         <label>
            <input type="checkbox" onclick="checkRequired(${counter})" id="q-required-${counter}"> Wajib diisi?
         </label>
         <div class="form-group">
            <label for="q-type-${counter}"><strong>Type Pertanyaan</strong></label>
            <select id="q-type-${counter}" class="form-control mb-2">
               <option value="">--Pilih satu--</option>
               <option value="1">Input</option>
               <option value="2">Single Option</option>
               <option value="3">Multiple Option</option>
            </select>
         </div>
         <div id="check-type-${counter}">
         </div>
      </div>
      <div class="card-footer">
         <div class="form-group">
            <button class="btn btn-dark" onclick="addElementQuest(${
               counter + 1
            })">Tambah</button>
            <button class="btn btn-primary" id="btn-remove-${counter}" onclick="removeElementQ(${counter})">Hapus</button>
         </div>
      </div>
   </div>
   `;
   questionForm.append(html);
   // counter++;
}

function removeElementQ(id) {
   $(`#q-${id}`).remove();
   for (let i = id; i <= counter; i++) {
      $(`#q-${i + 1}`).attr("id", `q-${i}`);
      $(`#label-q-${i + 1}`).html(`Pertanyaan ${i}`);
      $(`#btn-remove-${i + 1}`).attr("onclick", `removeElementQ(${i})`);
      $(`#btn-remove-${i + 1}`).attr("id", `btn-remove-${i}`);
      $(`#question-${i + 1}`).attr("id", `question-${i}`);
      $(`#label-q-${i + 1}`).attr("id", `label-q-${i}`);
   }
   counter--;
}

// let optCounter = 2;
function addElementOpt(i = 1, optCounter) {
   // optCounter++;
   $(`#check-type-${i} #btn-addopt-${i}-opt-${optCounter - 1}`).hide();
   let html = `
   <div class="form-group ml-5" id="opt-${optCounter}">
      <label for="q-type-${i}-opt-${optCounter}">Input Options</label>
      <div class="row">
         <input type="text" class="form-control col-md-8" id="q-type-${i}-opt-${optCounter}" autocomplete="off" placeholder="Masukkan Option" autofocus>
         <div class="col-md-2 d-flex">
            <button class="btn btn-info btn-sm text-white"
            id="btn-addopt-${i}-opt-${optCounter}" onclick="addElementOpt(
               ${i},${optCounter + 1})">
               Tambah
            </button>
            <button class="btn btn-primary ml-2 btn-sm text-white"
               id="btn-removeopt-${i}-opt-${optCounter}"
               onclick="removeElementOpt(${i},${optCounter})">
               Hapus
            </button>
         </div>
      </div>
   </div>
   `;
   $(`#check-type-${i}`).append(html);
}

function removeElementOpt(i, j) {
   optLength = $(`#check-type-${i}`).children().length;

   if (j == optLength) {
      $(`#check-type-${i} #btn-addopt-${i}-opt-${j - 1}`).show();
   }

   $(`#check-type-${i} #opt-${j}`).remove();

   if (optLength == 2) {
      $(`#check-type-${i} #btn-addopt-${i}-opt-2`).show();
   }

   for (let count = j; count <= optLength; count++) {
      $(`#opt-${count + 1}`).attr("id", `opt-${count}`);
      $(`#opt-${count + 1} label`).attr("for", `q-type-${i}-opt-${count}`);
      $(`#q-type-${i}-opt-${count + 1}`).attr("id", `q-type-${i}-opt-${count}`);
      $(`#btn-addopt-${i}-opt-${count + 1}`).attr(
         "onclick",
         `addElementOpt(${i},${count + 1})`
      );
      $(`#btn-addopt-${i}-opt-${count + 1}`).attr(
         "id",
         `btn-addopt-${i}-opt-${count}`
      );
      $(`#btn-removeopt-${i}-opt-${count + 1}`).attr(
         "onclick",
         `removeElementOpt(${i},${count})`
      );
      $(`#btn-removeopt-${i}-opt-${count + 1}`).attr(
         "id",
         `btn-removeopt-${i}-opt-${count}`
      );
   }
   // optCounter--;
}

function checkType(i) {
   $(`#questions`).on("change", `#q-type-${i}`, function () {
      let type = $(`#q-type-${i}`).val();
      let html = `
      <div class="form-group ml-5" id="opt-1">
         <label for="q-type-1-opt-1">Input Options</label>
         <div class="row">
            <input type="text" class="form-control col-md-8" id="q-type-${i}-opt-1" autocomplete="off" placeholder="Masukkan Option" autofocus>
         </div>
      </div>
      <div class="form-group ml-5" id="opt-2">
         <label for="q-type-1-opt-2">Input Options</label>
         <div class="row">
            <input type="text" class="form-control col-md-8" id="q-type-${i}-opt-2" autocomplete="off" placeholder="Masukkan Option">
            <div class="col-md-2 d-flex">
               <button class="btn btn-info btn-sm text-white"
                  id="btn-addopt-${i}-opt-2" onclick="addElementOpt(${i},3)">
                  Tambah
               </button>
            </div>
         </div>
      </div>
      `;
      if (type != "1" && type != "") {
         $(`#check-type-${i}`).html(html);
      } else {
         $(`#check-type-${i}`).html("");
      }
   });
}

function getTypeName(type) {
   if (type == "1") {
      return "Input";
   } else if (type == "2") {
      return "Single Option";
   } else if (type == "3") {
      return "Multiple Option";
   } else {
      return null;
   }
}

function checkRequired(i) {
   if ($(`#q-required-${i}`).is(":checked")) {
      return 1;
   } else {
      return 0;
   }
}

function save() {
   let data = {};
   for (let i = 1; i <= counter; i++) {
      let question = {};
      let choice = {};
      optLength = $(`#check-type-${i}`).children().length;

      if (optLength != 0) {
         for (let j = 1; j <= optLength; j++) {
            choice[`choice${j}`] = $(`#q-type-${i}-opt-${j}`).val();
            if (choice[`choice${j}`] == "") {
               $(`#q-type-${i}-opt-${j}`).focus();
               commonJS.swalError(
                  `Input opsi ${j} pertanyaan ${i} tidak boleh kosong`
               );
               return;
            } else {
               question["choice"] = choice;
            }
         }
      } else {
         question["choice"] = null;
      }

      // question["isRequired"] = $(`#q-required-${i}`).val();
      // question["question_type"] = getTypeName($(`#q-type-${i}`).val());
      // question["point"] = $(`#point-${i}`).val();
      // question["point"] = 100;
      question["survey_id"] = $("#survey-id").val();
      question["question"] = $(`#question-${i}`).val();
      question["is_required"] = checkRequired(i);
      question["question_type"] = $(`#q-type-${i}`).val();

      // validasi
      if (question["question"] == "") {
         $(`#question-${i}`).focus();
         commonJS.swalError(`Pertanyaan ke ${i} tidak boleh kosong`);
         return;
      } else if (question["question_type"] == "") {
         commonJS.swalError(`Type pertanyaan ke ${i} tidak boleh kosong`);
         return;
      } else {
         // validated
         data[i] = question;
      }
   }
   // console.log(data);
   commonAPI.postAPI(
      "/api/kuesioner/create",
      data,
      function (response) {
         commonJS.loading(false);
         // console.log(response);
         commonJS.swalOk(response.message, function () {
            window.location.href = "/cms/survey";
         });
      },
      function (response) {
         commonJS.loading(false);
         commonJS.swalError(response.responseJSON.message);
      }
   );
}
