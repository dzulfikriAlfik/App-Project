var globalPage = 1;

// function action button enter
function setupEventHandler(){
    $(".filter input").keypress(function(event){
        if(event.keyCode == 13){
            search(1)
        }
    });
    
    $(".modal input").keypress(function(event){
        if(event.keyCode == 13){
            save()
        }
    });
}

// select year
function selectYear(){
    $('#filterTahun').append($('<option />').val("").html(`Semua Tahun`));


    var url = "/api/combo/tahun"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterTahun').append($('<option />').val(`${data[index].tahun}`).html(`${data[index].tahun}`));
            }

        }
    })

}

// select tipe dokumen
function selectTipeDokumen(){


    var url = "/api/combo/tipe_dokumen"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterTipeDokumen').append($('<option />').val(`${data[index].value}`).html(`${data[index].label}`));
                $('#tipe_dokumen').append($('<option />').val(`${data[index].value}`).html(`${data[index].label}`));
            }

        }
    })

}

// select jenis peraturan
function selectJenisPeraturan(){


    var url = "/api/combo/jenis_peraturan"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterPeraturanDaerah').append($('<option />').val(`${data[index].value}`).html(`${data[index].label}`));
                $('#peraturan_daerah').append($('<option />').val(`${data[index].value}`).html(`${data[index].label}`));
            }

        }
    })

}

function buildTemplate(data, index, page, perPage){
    var rows = ""
    rows += "<tr class='template-data'>"
    rows += "<td style='text-align: center'>"
    rows += parseInt(perPage * (page-1)) + parseInt(index) + 1
    rows += "</td>"
    rows += "<td style='width:auto; white-space: normal; padding: 10px;'>"
    rows += data[index].tipe_dokumen
    rows += "</td>"
    rows += "<td style='width:auto; white-space: normal; padding: 10px;'>"
    rows += data[index].peraturan_daerah
    rows += "</td>"
    rows += "<td style='width:auto; white-space: normal; padding: 10px;'>"
    rows += data[index].no_perda
    rows += "</td>"
    rows += "<td style='width:auto; white-space: normal; text-align: center; padding: 10px;'>"
    rows += data[index].tahun
    rows += "</td>"
    rows += "<td style='width:auto; white-space: normal; text-align: center; padding: 10px;'>"
    if (data[index].is_hidden == 1){
        rows += `<span class="badge badge-warning">Hidden</span>`
    } else if (data[index].is_hidden == 0){
        rows += `<span class="badge badge-success">Show</span>`
    }
    rows += "</td>"
    rows += "<td>"   
    rows += `
    <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">`       
        if (data[index].is_hidden == 1){
            rows += "<button type='button' class='btn btn-light btn-xs dropdown-item dropdown-item' onClick='show(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-eye feather-16'></i> Show</button>"
        } else if (data[index].is_hidden == 0) {
            rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='hide(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-eye feather-16'></i> Hide</button>"
        }
        rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='view(\"" + data[index].id + "\",\"" + data[index].judul + "\",\"" + data[index].file + "\")' style='margin-right: 5px;'><i class='fa fa-file-text feather-16'></i> View</button>"
        rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='edit(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-pencil feather-16'></i> Edit</button>"
        rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='destroy(\"" + data[index].id + "\")'><i class='fa fa-trash feather-16'></i> Delete</button>"    
    rows += `</div>
    </div>`
    rows += "</td>"
    rows += "</tr>"

    return rows
}

// clear value filter search
function clearFilter(){
    $("#filterTipeDokumen").val("")
    $("#filterPeraturanDaerah").val("")
    $("#filterNomorPerda").val("")
    $("#filterTahun").val("")
    search();
}

function setUpInfo(structure){
    // clear
    $("#pagination").html("")
    $("#tableInfo").html("")

    $("#pagination").append(commonJS.buildPagination(structure))
    $("#tableInfo").append(commonJS.buildTableInfo(structure))
    $("#selectPage").on("change", function(val){
        globalPage = $("#selectPage option:selected").val();
        search();
    })
}

function search(page) {
    if (!page) page = globalPage;
    var url = "/api/perda/get?page=" + page
    
    var filterTipeDokumen = $("#filterTipeDokumen").val()
    var filterPeraturanDaerah = $("#filterPeraturanDaerah").val()
    var filterNomorPerda = $("#filterNomorPerda").val()
    var filterTahun = $("#filterTahun").val()
    var params = "&tipe_dokumen=" + filterTipeDokumen + "&peraturan_daerah=" + filterPeraturanDaerah + "&no_perda=" + filterNomorPerda + "&tahun=" + filterTahun

    $(".template-data").remove()
    commonJS.loading(true)
    commonAPI.getAPI(url + params, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var structure = response.data
            var data = structure.data

            // force search from page 1
            if (data.length == 0 && structure.current_page != 1){
                globalPage = 1
                search()
                return
            }

            var rows = "";
            if (data.length == 0){
                $("#nodata").show()
            }else{
                $("#nodata").hide()
            }
            for (var index in data){
                rows += buildTemplate(data, index, page, structure.per_page)
            }

            $("#data-table>tbody").append(rows);
            setUpInfo(structure)
            commonJS.loading(false)
        } else if(response.status==401){
            commonJS.swalError(response.message, function() {
                window.location = "/logout";
            });
        }
    })
}

// clear value when modal close
$(".modal").on("hidden.bs.modal", function(){
    $("#id").val('');
    $("#judul").val('');
    $("#tipe_dokumen").val('');
    $("#peraturan_daerah").val('');
    $("#no_perda").val('');
    $("#tahun").val('1990');
    $("#file").val('');
});

// function add
function add(){
    $('#modalForm').modal('show');
    $("#modalLabel").text("Add Dokumen Perda")
    $('#upload_file').html(`
        <div class="form-group row">
            <label for="file" class="col-sm-3 col-form-label">File</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
            </div>
        </div>`);
    $("#tahun").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
}

// function save
function save(){
    commonJS.clearMessage()
    if ($("#judul").val() == '') {
        $("#judul").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Judul"], commonMsg.MSG_REQUIRED))
        return
    }

    if ($("#tipe_dokumen").val() == '') {
        $("#tipe_dokumen").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Tipe Dokumen"], commonMsg.MSG_REQUIRED))
        return
    }
    
    if ($("#peraturan_daerah").val() == '') {
        $("#peraturan_daerah").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Peraturan Daerah"], commonMsg.MSG_REQUIRED))
        return
    }
    
    if ($("#no_perda").val() == '') {
        $("#no_perda").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Nomor Perda"], commonMsg.MSG_REQUIRED))
        return
    }

    if ($("#tahun").val() == '') {
        $("#tahun").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Tahun"], commonMsg.MSG_REQUIRED))
        return
    }

    if ($("#id").val() == ""){
        // console.log($("#file")[0].files[0])
        // validate required file
        if ($("#file").val() == '') {
            $("#file").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["File"], commonMsg.MSG_REQUIRED))
            return
        }
        // Validate type file
        if ($("#file")[0].files[0].type!='application/pdf') {
            $("#file").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["File"], commonMsg.MSG_ONLY_PDF))
            return
        }
        // validate file size
        if ($("#file")[0].files[0].size>10000000) {
            $("#file").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["File"], commonMsg.MSG_MORE_THAN_10MB))
            return
        }
    }

    commonJS.loading(true)

    // get value
    let judul = $("#judul").val(); 
    let tipe_dokumen = $("#tipe_dokumen").val();
    let peraturan_daerah = $("#peraturan_daerah").val();
    let no_perda = $("#no_perda").val();
    let tahun = $("#tahun").val();
    // console.log($("#file")[0].files[0].type)
    // form data
    var data = new FormData();
    data.append("judul", judul);
    data.append("tipe_dokumen", tipe_dokumen);
    data.append("peraturan_daerah", peraturan_daerah);
    data.append("no_perda", no_perda);
    data.append("tahun", tahun);
    // json data
    let dataJSON = {
        "judul": judul,
        "tipe_dokumen": tipe_dokumen,
        "peraturan_daerah": peraturan_daerah,
        "no_perda": no_perda,
        "tahun": tahun,
    }

    if ($("#id").val() == ""){        
        // append file to form data
        let file = $("#file")[0].files[0];
        data.append("file", file);
        // POST API
        commonAPI.postFormDataAPI("/api/perda/create", data, function(response){
            // console.log(response)

            // validate response hard code (Not Best Practice)
            let localJSON = {
                "error": {
                    "file": [
                        "File Must Be PDF Type"
                    ]
                }
            };
            // console.log(localJSON)
                
            if(JSON.stringify(response) == JSON.stringify(localJSON)){
                commonJS.swalError(response.error[Object.keys(response.error)[0]][0])
                commonJS.loading(false)
                return
            }
            // end validate response hard code (Not Best Practice)

            commonJS.loading(false)
            search()
            $('#modalForm').modal('hide');
        }, function(response){
            // console.log(response)
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message);
        })

    }else{
        commonAPI.putAPI("/api/perda/put/" + $("#id").val(), dataJSON, function(response){
            commonJS.loading(false)
            search()
            $('#modalForm').modal('hide');
        }, function(response){
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message);
        })
    }
}

// function edit
function edit(id){
    $('#modalForm').modal('show');
    $('#modalLabel').html('Edit Dokumen Perda');
    $('#upload_file').html('');
    $("#tahun").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
    commonJS.loading(true)
    commonAPI.getAPI(`/api/perda/get/${id}`, (response) => {
        if(response.status==200){
            $("#id").val(response.data.id);
            $("#judul").val(response.data.judul);
            $("#tipe_dokumen").val(response.data.code_tipe_dokumen);
            $("#peraturan_daerah").val(response.data.code_peraturan_daerah);
            $("#no_perda").val(response.data.no_perda);
            $("#tahun").val(response.data.tahun);
            commonJS.loading(false)
        } else if(response.status==401){
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message)
        }
    })
}

function destroy(id) {
    commonJS.swalConfirmAjax("Are you sure you want to delete this data?", "Yes", "No", commonAPI.deleteAPI, `/api/perda/delete/${id}`, function(response){
        if (response.status == 200) {
            search(globalPage);
        } else if (response.status==401){
            swalError(response.message)
        }
        commonJS.loading(false)
    }, function(response){
        commonJS.loading(false)
        commonJS.swalError(response.responseJSON.message);
    })
}

function hide(id) {
    commonJS.swalConfirmAjax("Are you sure you want to hide this data?", "Yes", "No", commonAPI.hideShowAPI, `/api/perda/hide/${id}`, function(response){
        if (response.status == 200) {
            search(globalPage);
        } else if (response.status==401){
            swalError(response.message)
        }
        commonJS.loading(false)
    }, function(response){
        commonJS.loading(false)
        commonJS.swalError(response.responseJSON.message);
    })
}

function show(id) {
    commonJS.swalConfirmAjax("Are you sure you want to show this data?", "Yes", "No", commonAPI.hideShowAPI, `/api/perda/show/${id}`, function(response){
        if (response.status == 200) {
            search(globalPage);
        } else if (response.status==401){
            swalError(response.message)
        }
        commonJS.loading(false)
    }, function(response){
        commonJS.loading(false)
        commonJS.swalError(response.responseJSON.message);
    })
}

function view(id, judul, file) {
    $('#modalPreview').modal('show');
    $('#modalPreviewLabel').html(judul)
    $("#previewFrame").attr("src", '/api/perda/download/'+id)
    $("#footerPreview").html('<a href="/api/perda/download/' + id + '" download="' + file + '"><button type="button" class="btn btn-input btn-dark"><i class="fa fa-download feather-16"></i> Download</button></a>')
}

$(function(){
    // on document ready
    selectYear()
    selectJenisPeraturan()
    selectTipeDokumen()
    setupEventHandler()
    search()
})