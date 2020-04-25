admin.contact_us = {
    initialize: function ()
    {
        var this_class = this;

        $('.send').on('click', function () {
            this_class.email_send();
        });

        $('body').on('click', '.btnEdit_contact_us', function () {
            var id = $(this).data('id');
            this_class.edit_row(id);
        });

        $('body').on('click', '.btnDelete_contact_us', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        admin.contact_us.load_contact_us();
      //  admin.contact_us.refresh_validator();

        $('body').on('click', '.em_reply', function () {
            
            var id = $(this).data('id');
            this_class.email_reply_user(id);
        });

        $(".open-modal").on('click', function () {
            $('#frm_contact_us')[0].reset();
        });
        
        

    },
    load_contact_us: function () {

        var table = jQuery('.contact_us-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [[0, "desc"]],
            ajax: {
                url: BASE_URL +  '/' + ADMIN + '/contact/getdata',
                type: 'POST',
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'package_name', name: 'package_name'},
                {data: 'gender', name: 'gender'},
                {data: 'firstname', name: 'firstname'},
                {data: 'lastname', name: 'lastname'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'reply', name: 'reply'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    
    delete_row: function (id) {

        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/contact/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.contact_us.load_contact_us();
                    }
                }
            });
        }
        else {
            return false;
        }


    },
    email_reply_user: function (id) {
        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/contact/email',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {

                        $("#reply_email").modal("show");
                        $("#em_name").val(data.content.email);
                        admin.contact_us.load_contact_us();
                    }
                }
            });
        }
        else {
            return false;
        }

    },
    
    email_send: function (){
     
        $.ajax({
            url: BASE_URL + '/' + ADMIN + '/contact/email_send',
            type: 'POST',
            data: $('#frm_email_send').serialize(),
            success: function (data) {
                 var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#reply_email').modal('hide');
                        alert(data.msg);
                    }else{
                       alert(data.msg);
                    }
            }
        });
    }
    
    
};