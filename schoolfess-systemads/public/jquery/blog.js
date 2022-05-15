var globalPage = 1;
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

function buildTemplate(data, index, page, perPage){
    var rows = ""
    rows += "<tr class='template-data'>"
    rows += "<td style='text-align: center'>"
    rows += parseInt(perPage * (page-1)) + parseInt(index) + 1
    rows += "</td>"
    rows += "<td>"
    rows += data[index].blog_title
    rows += "</td>"
    rows += "<td>"
    // rows += data[index].blog_img
    rows += `<img src="/api/blog/cover_img/${data[index].id}" alt="">`
    rows += "</td>"
    rows += "<td>"
    if (data[index].is_draft == 1){
        rows += `<span class="badge badge-warning">Unpublish</span>`
    } else if (data[index].is_draft == 0){
        rows += `<span class="badge badge-success">Publish</span>`
    }
    rows += "</td>"
    rows += "<td>"
    rows += `
    <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">`       
        if (data[index].is_draft == 1){
            rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='publish(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-eye feather-16'></i> Publish</button>"
        } else if (data[index].is_draft == 0) {
            rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='draft(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-eye feather-16'></i> Unpublish</button>"
        }
        rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='edit(\"" + data[index].id + "\")' style='margin-right: 5px;'><i class='fa fa-pencil feather-16'></i> Edit</button>"
        rows += "<button type='button' class='btn btn-light btn-xs dropdown-item' onClick='destroy(\"" + data[index].id + "\")'><i class='fa fa-trash feather-16'></i> Delete</button>"   
    rows += `</div>
    </div>`
    rows += "</td>"
    rows += "</tr>"

    return rows
}

// clear filter
function clearFilter(){
    $("#filterTitle").val("")
    globalPage = 1
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
    var url = "/api/blog/get?page=" + page
    
    var filterTitle = $("#filterTitle").val()
    var params = "&blog_title=" + filterTitle

    $(".template-data").remove()
    commonJS.loading(true)
    commonAPI.getAPI(url + params, (response) => {
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

// function add
function add(){
    $('#modalForm').modal('show');
    $("#modalLabel").text("Add New Blog");
    $('#upload_cover').html(`
        <div class="form-group row">
            <label for="blog_img" class="col-sm-3 col-form-label">Cover Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" id="blog_img" name="blog_img" accept="image/*">
            </div>
        </div>`);
    $('#saveDraft').html(`
        <button type="button" class="btn btn-input btn-light" onClick="save(1)">Save as Draft</button>`);
}

function save(draft){
    commonJS.clearMessage()
    if ($("#blog_title").val() == '') {
        $("#blog_title").focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Blog Title"], commonMsg.MSG_REQUIRED))
        return
    }
    
    if (CKEDITOR.instances["article-ckeditor"].getData() == '') {
        $(CKEDITOR.instances["article-ckeditor"]).focus();
        commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Blog Content"], commonMsg.MSG_REQUIRED))
        return
    }

    if ($("#id").val() == ""){
        // console.log($("#file")[0].files[0])
        // validate required file
        if ($("#blog_img").val() == '') {
            $("#blog_img").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Blog Image Cover"], commonMsg.MSG_REQUIRED))
            return
        }
        // Validate type file
        // console.log($("#blog_img")[0].files[0].type)
        if ($("#blog_img")[0].files[0].type.split('/')[0] != 'image') {
            $("#blog_img").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["File"], commonMsg.MSG_ONLY_IMG))
            return
        }
        // validate file size
        if ($("#blog_img")[0].files[0].size>10000000) {
            $("#blog_img").focus();
            commonJS.showErrorMessage("#msgBox", commonMsg.getMessage(["Blog Image Cover"], commonMsg.MSG_MORE_THAN_1MB))
            return
        }
    }
    
    commonJS.loading(true)

    // harus kaya gini, kalau langsung ke jquery ga kedeteksi
    // var data
    let blog_title = $("#blog_title").val();
    let blog_text = CKEDITOR.instances["article-ckeditor"].getData();

    // form data
    var data = new FormData();
    data.append("blog_title", blog_title);
    data.append("blog_text", blog_text);

    // json data
    let dataJSON = {
        "blog_title": blog_title,
        "blog_text": blog_text,
    }

    if ($("#id").val() == ""){
        // append file to form data
        let blog_img = $("#blog_img")[0].files[0];
        data.append("blog_img", blog_img);
        // append is draft
        if (draft) {
            data.append("is_draft", 1);
        }
        if (!draft) {
            data.append("is_draft", 0);
        }
        commonAPI.postFormDataAPI("/api/blog/create", data, function(response){            
            for (var pair of data.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }
            if (!response.error){
                search()
                $('#modalForm').modal('hide');
            }
            commonJS.loading(false)
        }, function(response){
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message);
        })
    }else{
        if (draft) {
            dataJSON["is_draft"] = 1;
        }
        if (!draft) {
            dataJSON["is_draft"] = 0;
        }
        // console.log(JSON.stringify(dataJSON));
        commonAPI.putAPI("/api/blog/put/" + $("#id").val(), dataJSON, function(response){
            if (!response.error){
                search()
                $('#modalForm').modal('hide');
            }
            commonJS.loading(false)
        }, function(response){
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message);
        })
    }
}

// function edit
function edit(id){
    $('#modalForm').modal('show');
    $("#modalLabel").text("Edit Blog");
    $('#upload_cover').html('');
    $('#saveDraft').html(`
        <button type="button" class="btn btn-input btn-light" onClick="save(1)">Save as Draft</button>`);
    commonJS.loading(true)
    commonAPI.getAPI(`/api/blog/get/${id}`, (response) => {
        if(response.status==200){
            $("#id").val(response.data.id);
            $("#blog_title").val(response.data.blog_title);
            // $("#article-ckeditor").val(response.data.blog_text);
            CKEDITOR.instances["article-ckeditor"].setData(response.data.blog_text)
            commonJS.loading(false)
        } else if(response.status==401){
            commonJS.loading(false)
            commonJS.swalError(response.responseJSON.message)
        }
    })
}

function update(){
    // get value
    let id = $("#id").val();
    let blog_title = $("#blog_title").val();
    let blog_text = $("#blog_text").val();
    // loading
    // loadingOn();
    // process
    $.ajax({

        url: `/api/blog/put/${id}`,
        datatype: 'html',
        data: {
            blog_title: blog_title ,
            blog_text : blog_text
        },
        type: "PUT",
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'),
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){

            // console.log(response)
            $('#inputModal').modal('hide')
            read()

            if (response.status===200) {
                commonJS.toastSuccess(response.message);
            } else if(response.status==401){
                commonJS.swalError(response.message).then(function() {
                    window.location = "/logout";
                });
            }

        },

        error:function(response){

            // console.log(response.responseJSON.message)

            commonJS.swalError(response.responseJSON.message)

        }

    });
}

function destroy(id) {
    commonJS.swalConfirmAjax("Are you sure you want to delete this data?", "Yes", "No", commonAPI.deleteAPI, `/api/blog/delete/${id}`, function(response){
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

function draft(id) {
    commonJS.swalConfirmAjax("Are you sure you want to draft this blog?", "Yes", "No", commonAPI.hideShowAPI, `/api/blog/draft/${id}`, function(response){
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

function publish(id) {
    commonJS.swalConfirmAjax("Are you sure you want to publish this blog?", "Yes", "No", commonAPI.hideShowAPI, `/api/blog/publish/${id}`, function(response){
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

// clear value when modal close
$(".modal").on("hidden.bs.modal", function(){
    $("#id").val('');
    $("#blog_title").val('');
    CKEDITOR.instances["article-ckeditor"].setData()
    $("#blog_img").val('');
});

$(function(){
    // on document ready
    setupEventHandler()
    search()
})