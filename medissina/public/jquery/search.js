let globalPage = 1;
// function action button enter
function setupEventHandler(){
    $(".filter input").keypress(function(event){
        if(event.keyCode == 13){
            buttonSearch(1)
        }
    });
}

// button search
function buttonSearch(page){
    if (!page) page = globalPage;
    let url = "/beranda/peraturan?page=" + page
    var filterJudul = $("#filterJudul").val()
    var filterTipeDokumen = $("#filterTipeDokumen").val()
    var filterJenisPeraturan = $("#filterJenisPeraturan").val()
    var filterNomorDokumen = $("#filterNomorDokumen").val()
    var filterTahun = $("#filterTahun").val()
    var params = "&judul=" + filterJudul + "&tipe_dokumen=" + filterTipeDokumen + "&jenis_peraturan=" + filterJenisPeraturan + "&no_perda=" + filterNomorDokumen + "&tahun=" + filterTahun

    window.location.href = url + params;
}

// select year
function selectYear(){
    $('#filterTahun').append($('<option />').val("").html(`Semua Tahun`));


    var url = "/api/combos/tahun"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterTahun').append($('<option />').val(`${data[index].tahun}`).html(`${data[index].tahun}`));
            }


            if(commonJS.getUrlParameter('tahun')!=false){
                $("#filterTahun").val(`${commonJS.getUrlParameter('tahun')}`)
            }

        }
    })

}

// select tipe dokumen
function selectTipeDokumen(){


    var url = "/api/combos/tipe_dokumen"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterTipeDokumen').append($('<option />').val(`${data[index].label}`).html(`${data[index].label}`));
            }


            if(commonJS.getUrlParameter('tipe_dokumen')!=false){
                $("#filterTipeDokumen").val(commonJS.getUrlParameter('tipe_dokumen'))
            }

        }
    })

}

// select jenis peraturan
function selectJenisPeraturan(){


    var url = "/api/combos/jenis_peraturan"
    commonAPI.getAPI(url, (response) => {
        // console.log(response)
        if(response.status==200){
            // refine structure
            var data = response.data

            for (var index in data){
                $('#filterJenisPeraturan').append($('<option />').val(`${data[index].label}`).html(`${data[index].label}`));
            }


            if(commonJS.getUrlParameter('jenis_peraturan')!=false){
                $("#filterJenisPeraturan").val(commonJS.getUrlParameter('jenis_peraturan'))
            }

        }
    })

}

// clear filter
function clearFilter(){
    $("#filterJudul").val("")
    $("#filterTipeDokumen").val("")
    $("#filterJenisPeraturan").val("")
    $("#filterNomorDokumen").val("")
    $("#filterTahun").val("")
    search()
}

// function on doc ready
$(function(){
    // on document ready
    selectYear()
    selectTipeDokumen()
    selectJenisPeraturan()
    setupEventHandler()
    // console.log(commonJS.getUrlParameter('judul'))
    if(commonJS.getUrlParameter('judul')!=false){
        $("#filterJudul").val(commonJS.getUrlParameter('judul'))
    }
    if(commonJS.getUrlParameter('no_perda')!=false){
        $("#filterNomorDokumen").val(commonJS.getUrlParameter('no_perda'))
    }
})