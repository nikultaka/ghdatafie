admin.site_setting = {
    initialize: function ()
    {
        var this_class = this;
        $("#contact_image_upload").change(function () {
            this_class.readURL(this);
        });
        admin.site_setting.refresh_validator();

    },
    readURL: function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewing').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    },
     refresh_validator: function () {
        $.validate({
            form: '#logo_upload_form',
            onSuccess: function () {
                
                var form = $("#logo_upload_form");
                var formData = new FormData(form[0]);
                $.ajax({
                        url: BASE_URL + '/' + ADMIN + "/sitesetting/save_details",
                        type: 'POST',
                        data: formData,
                        datatype: 'json',
                        success: function (data) {
                            var data = $.parseJSON(data);
                            if (data.status == 1) {
                                $("#msg").html(data.msg);
                                setTimeout(function(){ 
                                    $("#msg").html('');
                                }, 3000);
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
            },
        });
    },
};

