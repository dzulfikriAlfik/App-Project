// GET data user login
readUserLogin();

function readUserLogin() {
    $.ajax({
        url: `/api/user/get/${localStorage.getItem('id_user')}`,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'),
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
            'Content-Type':'application/json'
        },
        method: 'GET',
        dataType: 'JSON',
        success: function(response){
            // console.log(response);
            if(response.status==200){
                // console.log(response.data);
                $('#user_image').attr('src', `https://profile.schfess.id/public/${response.data.user_image}`);
                $('#user_image_sm').attr('src', `https://profile.schfess.id/public/${response.data.user_image}`);
                $('#user_name').html(`${response.data.user_name}`);
                $('#user_email').html(`${response.data.user_email}`);
            } else if(response.status==401){
                commonJS.swalError(response.message, function() {
                    window.location = "/logout";
                });
            }
        },
        error:function(response){
            commonJS.swalError(response.responseJSON.message);
        }
    });
}

function logout(){
    commonJS.swalConfirm("Apakah anda yakin ingin logout?", "Ya", "Tidak", function(){
        let token = localStorage.getItem('token')
        let data = {
            "token": token
        }
        window.location.href = '/logout';
        // commonAPI.getLogoutAPI("/api/logout", data, (response) => {
        //     if(response.status==200){   
        //         window.location.href = '/logout';
        //     }
        // })
    })
    // console.log("Logout Clicked")
    // const swalWithBootstrapButtons = Swal.mixin({
    // customClass: {
    //     confirmButton: 'btn btn-success',
    //     cancelButton: 'btn btn-danger mr-2'
    // },
    // buttonsStyling: false,
    // })
    
    // swalWithBootstrapButtons.fire({
    // title: 'Apakah anda yakin ingin logouts?',
    // icon: 'warning',
    // showCancelButton: true,
    // confirmButtonClass: 'mr-2',
    // confirmButtonText: 'Yes',
    // cancelButtonText: 'No',
    // reverseButtons: false,
    // showLoaderOnConfirm: true,
    // preConfirm: function () {
    //     window.location.href = '/logout';
    // },
    // }).then((result) => {
    // if (result.value) {
    //     console.log("Success Logout")
    // } else if (
    //     // Read more about handling dismissals
    //     result.dismiss === Swal.DismissReason.cancel
    // ) {
    //     swalWithBootstrapButtons.fire(
    //     'Cancelled',
    //     )
    // }
    // })
}