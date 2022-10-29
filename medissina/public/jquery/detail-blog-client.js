// get data by ID
function getByID(){
    let id = commonJS.getUrlParameter('id')
    // console.log(id)
    let url = "/api/blog/client/get/" + id
    commonAPI.getAPI(url, (response) => {
        if(response.status==200){
            if (response.data==null){
                window.location = "/404";
            }
            // console.log(response)
            $("#title-blog").html(`
                ${response.data.blog_title}
            `)
            $("#cover-blog").html(`
                <img src="/api/blog/cover_img/${response.data.id}" class="img-fluid rounded" alt="...">
            `)
            $("#content-blog").html(`
                ${response.data.blog_text}
            `)
        }
    })

}

// function on doc ready
$(function(){
    // on document ready
    getByID()
})