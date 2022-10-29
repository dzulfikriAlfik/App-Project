var captionText = document.getElementById("caption");

$(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        captionText.innerHTML = $(this).find('img').attr("alt");;
        $('#imagemodal').modal('show');
    });		
});