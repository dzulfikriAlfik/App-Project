$(document).ready(function() {

    $(".btn-register").click( function() {

        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let token = $("meta[name='csrf-token']").attr("content");
        let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        if (email.length == "") {
            commonJS.swalError('Email is required');
        } else if (name.length == "") {
            commonJS.swalError('Name is required');
        } else if (!pattern.test(email)) {
            commonJS.swalError('Email is not valid');
        } else if (password.length == "") {
            commonJS.swalError('Password is required');
        } else {
            $("#email").prop('disabled', true);
            $("#password").prop('disabled', true);
            $("#name").prop('disabled', true);
            $(".btn-register").prop('disabled', true);
            $.ajax({

                url: "api/register",
                type: "POST",
                dataType: "JSON",
                data: {
                    "name": name,
                    "email": email,
                    "password": password
                },
                success:function(response){

                    // console.log(response)

                    commonJS.swalOk(response.message, function() {
                        window.location.href = '/login';
                    });

                },

                error:function(response){

                    commonJS.swalError(response.responseJSON.message);

                }

            });
        }

    });

});