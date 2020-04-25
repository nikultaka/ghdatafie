frontend.pricing = {
    initialize: function ()
    {
        frontend.pricing.form_submit();
    },
     form_submit: function () {
        $.validate({
            form: '#premiumRegister',
            onSuccess: function () {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL +'/order/add',
                    data: $('#premiumRegister').serialize(),
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg').html(data.msg);
                             $("#msg").css("color", "green"); 
                             $('#premiumRegister')[0].reset();
                        } else {
                            $('#msg').html(data.msg);
                            $("#msg").css("color", "red");
                            $('#premiumRegister')[0].reset();
                        }
                    },
                    
                });
            },
        });
    },
}