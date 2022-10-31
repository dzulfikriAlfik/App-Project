// build template
function buildTemplate(data, index){
    var rows = ""
    rows += "<article class='item post col-md-12 mb-3'>"
    rows += "<div class='card'>"
    rows += "<div class='card-body'>"
    rows += "<div class='post-header'>"
    rows += `<div class='post-content'>Dokumen : ${data[index]._source.tipe_dokumen}</div>`
    rows += `<h2 class='post-title h3 mt-1 mb-3'><a href='/beranda/peraturan/detail?id=${data[index]._source.id}' class='hover' rel='category'>${data[index]._source.judul}</a></h2>`
    rows += "</div>"
    rows += "<div class='post-content'>"
    rows += "<span><b>Tentang PENYELENGGARAAN PELINDUNGAN PEKERJA MIGRAN INDONESIA ASAL DAERAH PROVINSI JAWA BARAT</b></span>"
    rows += "<p>Pekerja Migran Indonesia (PMI) asal Jawa Barat memiliki peran yang sangat penting dalam pembangunan daerah maupun nasional sebagai potensi sumber daya manusia. Hal tersebut menyebabkan para pekerja migran beserta calon pekerja migran Indonesia asal Jawa Barat membutuhkan perlindungan dari perdagangan or...</p>"
    rows += "</div>"
    rows += "</div>"
    rows += "<div class='card-footer'>"
    rows += "<ul class='post-meta d-flex mb-0'>"
    rows += `<li class='post-date'><i class='uil uil-calendar-alt'></i><span>Tanggal  : ${moment(data[index]._source.created_dt).format('LL')}</span></li>`
    rows += "<li class='post-comments'><i class='uil uil-map'></i>Tempat  : Bandung</li>"
    rows += `<li class='post-likes'><i class='uil uil-cloud-download'></i>Diunduh : ${commonJS.formatNumber(data[index]._source.jml_download)}</li>`
    rows += "</ul>"
    rows += "</div>"
    rows += "</div>"
    rows += "</article>"

    return rows
}


// search data
function search(page){
    if (!page) page = globalPage;
    var url = "/api/perda/es/get"
    
    var filterJudul = commonJS.getUrlParameter('judul')
    var filterTipeDokumen = commonJS.getUrlParameter('tipe_dokumen')
    var filterJenisPeraturan = commonJS.getUrlParameter('jenis_peraturan')
    var filterNomorDokumen = commonJS.getUrlParameter('no_perda')
    var filterTahun = commonJS.getUrlParameter('tahun')
   
    let data = {
        "page": page,
        "judul": filterJudul,
        "tipe_dokumen": filterTipeDokumen,
        "peraturan_daerah": filterJenisPeraturan,
        "no_perda": filterNomorDokumen,
        "tahun": filterTahun
    }

    $("#doc").html(``);
    $("#count-data").html(``);
    commonJS.loading(true)
    commonAPI.getAPIBody(url, data, (response) => {
        if(response.status==200){
            // console.log(response)
            // console.log(response.data.data.length)
            let countData = response.search.hits.hits.length;
            $("#count-data").html(`
            Ditemukan <font color="red">${countData}</font> dokumen hukum peraturan daerah`)
            // refine structure
            var structure = response.search.hits.hits
            var data = structure

            // console.log(data)

            var rows = "";

            for (var index in data){
                console.log(data[index]._source)
                // console.log(moment(data[index].created_dt).format('LL'))
                rows += buildTemplate(data, index)
            }

            $("#doc").append(rows);

            commonJS.loading(false)
        }
    })

}

// function on doc ready
$(function(){
    // on document ready
    search()
})