admin.subcategory = {
    initialize: function ()
    {
        var this_class = this;
        
        $('body').on('click', '.btnEdit_subcategory', function () {
            var id = $(this).data('id');
            this_class.edit_row(id);
        });

        $('body').on('click', '.btnDelete_subcategory', function () {
            var subcategory_id = $(this).data('id');
            this_class.delete_row(subcategory_id);
        });

        admin.subcategory.load_subcategory();

        admin.subcategory.refresh_validator();

        $('#ins_subcategory').on('hidden.bs.modal', function () {
            $('#frm_subcategory')[0].reset();
            $('#subcategory_id').val('');
        });

    },
    load_subcategory: function () {

        var table = jQuery('.subcategory-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            ajax: {
                url: BASE_URL +'/'+ ADMIN+'/subcategory/gettable',
                type: 'POST',
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
                {data: 'category_name', name: 'category_name'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        
        $.validate({
            form : '#frm_subcategory',
             onSuccess : function() {
                    $.ajax({
                            url: BASE_URL + '/'+ADMIN+'/subcategory/add',
                            type: 'POST',
                            data: $('#frm_subcategory').serialize(),
                            datatype: 'json',
                            success: function (data) {
                                var data = $.parseJSON(data);
                                if (data.status == 1) {
                                    $('.alert').show();
                                    $("#ins_subcategory").modal("hide");
                                    $('#msg_main').html(data.msg);
                                    //$('#msg_main').attr('style', 'color:green;');
                                    $('#frm_subcategory')[0].reset()
                                    admin.subcategory.load_subcategory();
                                }
                                else {
                                    return false;
                                }
                            }
                        });
              },
          });
    },
    edit_row: function (id) {


        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/'+ADMIN+ '/subcategory/edit',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {

                        $("#subcategory_id").val(data.content.id);
                        $("#subcategory_name").val(data.content.name);
                        $("#description").val(data.content.description);

                        var category_id = $("#category_id").val(data.content.category_id);
                        category_id.attr("selected", "selected");
                        
                        var status_id = $("#status").val(data.content.status);
                        status_id.attr("selected", "selected");
                        $("#ins_subcategory").modal("show");
                    }
                }
            });
        }
        else {
            return false;
        }

    },
    delete_row: function (id) {

        if (id > 0) {
             if (confirm("Are you sure?")) {
                    $.ajax({
                        url: BASE_URL +  '/'+ADMIN+ '/subcategory/delete',
                        type: 'POST',
                        data: {_token: admin.common.get_csrf_token_value(), id: id},
                        success: function (data) {
                            var data = $.parseJSON(data);
                            if (data.status == 1) {
                                $('.alert').show();
                                $('#msg_main').html(data.msg);
                               // $('#msg_main').attr('style', 'color:green;');
                                admin.subcategory.load_subcategory();
                            }
                        }
                    });
            }
        }
        else {
            return false;
        }


    },
};