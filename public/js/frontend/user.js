frontend.user = {

    initialize: function ()

    {

        function readURL(input) {



            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#profile_pic').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }



        $("#imgtoupload").change(function () {

            readURL(this);

        });
        
        $("body").on("blur", "#email", function () {
            var email = $('#email').val();
            $.ajax({
                url: BASE_URL + '/check_email',
                type: 'POST',
                data:{_token: frontend.common.get_csrf_token_value(), "email":email},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if(data.status == 1){
                        $('#email').css('border-color','rgb(185, 74, 72)');
                        $('#email_exist_error').html(data.msg);
                    }
                },
                error: function () {
                    alert("error");
                },
                async: false
            });
        });

        var this_class = this;

        frontend.user.refresh_validator();

        frontend.user.reset_password();

        frontend.user.forgot_password();

        frontend.user.login_validator();

    },

    refresh_validator: function () {

        $.validate({

            modules : 'file',

            form: '#register-form',

            onSuccess: function () {

                var form = $("#register-form");

                var formData = new FormData(form[0]);

                $.ajax({

                    type: 'POST',

                    url: BASE_URL + '/register/add',

                    data: formData,

                    datatype: 'json',

                    success: function (data) {

                        var data = $.parseJSON(data);

                        if (data.status == 1) {

                            window.location.href = BASE_URL +'/login'

                        } else {

                            return false;

                        }

                    },

                    cache: false,

                    contentType: false,

                    processData: false

                });

            },

            onValidate : function($form) {



                var obj = {};

                $.ajax({

                    type: 'POST',

                    url: BASE_URL + '/check_email',

                    async: false,  

                    data: {email : $('#email').val() , '_token' : frontend.common.get_csrf_token_value() },

                    success: function (data) {

                        var data = $.parseJSON(data);

                        if (data.status == 1) {

                            obj.element = $('#email');

                            obj.message = data.msg;

                        }

                    }

                });

                return obj;

            }

        });

    },

    

    reset_password: function () {

        $.validate({

            modules : 'security',

            form: '#reset_pass_form',

            onSuccess: function () {

                $.ajax({

                    url: BASE_URL + '/resetpass',

                    type: 'POST',

                    data: $("#reset_pass_form").serialize(),

                    success: function (data) {



                        var result = JSON.parse(data);

                        if(result.status == 1){

                            $('#reset_pass_form')[0].reset();

//                          $("#pass_msg").css('color','green');

                          $("#pass_msg").html(result.msg);

                        } else {

                          $("#pass_msg").css('color','red');

                          $("#pass_msg").html(result.msg);

                        }

                    }

                })

            },

        });

    },

    forgot_password: function () {

        $.validate({

            modules : 'security',

            form: '#forgot_pass_form',

            onSuccess: function () {

                $.ajax({

                    url: BASE_URL + '/send_mail',

                    type: 'POST',

                    data: $("#forgot_pass_form").serialize(),

                    success: function (data) {



                        var result = JSON.parse(data);

                        if(result.status == 1){

                            $('#forgot_pass_form')[0].reset();

                          $("#email_msg").css('color','green');

                          $("#email_msg").html(result.msg);

                        } else {

                          $("#email_msg").css('color','red');

                          $("#email_msg").html(result.msg);

                        }

                    }

                })

            },

        });

    },

    login_validator: function () {

        $.validate({

            form: '#login-form',

            onSuccess: function () {

                $.ajax({

                    type: 'POST',

                    url: BASE_URL + '/login',

                    data: $('#login-form').serialize(),

                    datatype: 'json',

                    success: function (data) {

                        var data = $.parseJSON(data);

                        if (data.status == 1) {

                            $("#login_msg").css('color','green');

                            $('#login_msg').html(data.msg);

                            

                            window.location.href = BASE_URL+'/'

                        } else {

                            $("#login_msg").css('color','red');

                            $('#login_msg').html(data.msg);

                        }

                    },

                });

            },

        });

    },

}

