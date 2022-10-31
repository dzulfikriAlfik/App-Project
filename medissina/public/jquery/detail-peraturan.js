// var name file
var file;

// get data by ID
function getByID(){
    let id = commonJS.getUrlParameter('id')
    // console.log(id)
    let url = "/api/perdas/get/" + id
    commonAPI.getAPI(url, (response) => {
        if(response.status==200){
            if (response.data.is_hidden==1){
                window.location = "/404";
            }
            if (response.data==null){
                window.location = "/404";
            }
            // console.log(response)
            $("#jenis_dokumen").html(`${response.data.tipe_dokumen}`)
            $("#no_perda").html(`${response.data.no_perda}`)
            $("#judul").html(`${response.data.judul}`)
            $("#peraturan_daerah").html(`${response.data.peraturan_daerah}`)
            $("#jml_download").html(`${commonJS.formatNumber(response.data.jml_download)}`)
            $("#download").html(`<a href="/api/perda/download/${response.data.id}" download="${response.data.file}">${response.data.file}</a>`)
            $("#previewFrame").attr("src", '/api/perda/download/' + response.data.id)
            file = response.data.file;
        }
    })

}

// preview file
// function previewFile(){
//     window.open('/files/'+file, '_blank');
// }

// function on doc ready
$(function(){
    // on document ready
    getByID()
})