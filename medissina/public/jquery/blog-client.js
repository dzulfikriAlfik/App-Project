// build template
function buildTemplateBlog(data, index){
    var rows = ""
    rows += `<div class='col-sm-4 mb-3'>
                <img src="/api/blog/cover_img/${data[index].id}" class="img-fluid rounded" alt="...">
            </div>
            <div class="col-sm-8 mb-3">
                <span class="card-article">24 - 9 - 2021</span> <br>
                <a href='/beranda/blog/detail?id=${data[index].id}'>${data[index].blog_title}</a>
                <span class="card-article">${data[index].blog_text}</span>
            </div>`

    return rows
}

// build template
function buildTemplateBlogAll(data, index){
    var rows = ""
    rows += `<div class='col-sm-4 mb-3'>
                <img src="/api/blog/cover_img/${data[index].id}" class="img-fluid rounded" alt="...">
            </div>
            <div class="col-sm-8 mb-3">
                <span class="card-article">24 - 9 - 2021</span> <br>
                <a href='/beranda/blog/detail?id=${data[index].id}'>${data[index].blog_title}</a>
                <span class="card-article">${data[index].blog_text}</span>
            </div>`

    return rows
}


// search data
function searchBlog(){
    var url = "/api/blog/client/get"

    $("#blog").html(``);
    commonJS.loading(true)
    commonAPI.getAPI(url, (response) => {
        if(response.status==200){
            // console.log(response)
            // console.log(response.data)
            // refine structure
            var structure = response.data
            var data = structure.data

            // console.log(data)

            var rows = "";

            for (var index in data){
                // console.log(data[index])
                // console.log(moment(data[index].created_dt).format('LL'))
                rows += buildTemplateBlog(data, index)
            }

            $("#blog").append(rows);

            commonJS.loading(false)
        }
    })

}

// search data
function searchBlogAll(){
    var url = "/api/blog/client/getAll"

    $("#blog").html(``);
    commonJS.loading(true)
    commonAPI.getAPI(url, (response) => {
        if(response.status==200){
            // console.log(response)
            // console.log(response.data)
            // refine structure
            var structure = response.data
            var data = structure.data

            // console.log(data)

            var rows = "";

            for (var index in data){
                // console.log(data[index])
                // console.log(moment(data[index].created_dt).format('LL'))
                rows += buildTemplateBlogAll(data, index)
            }

            $("#blogAll").append(rows);

            commonJS.loading(false)
        }
    })

}

// function on doc ready
$(function(){
    // on document ready
    // searchBlog()
    // searchBlogAll()
})