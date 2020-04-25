admin.category = {
    initialize: function ()
    {
        var this_class = this;
        
        $('body').on('click', '.btnEdit_category', function () {
            var id = $(this).data('id');
            this_class.edit_row(id);
        });

        $('body').on('click', '.btnDelete_category', function () {
            var category_id = $(this).data('id');
            this_class.delete_row(category_id);
        });

        admin.category.load_category();

        admin.category.refresh_validator();

        $('#ins_category').on('hidden.bs.modal', function () {
            $('#frm_category')[0].reset();
            $('#category_id').val('');
        });

    },
    load_category: function () {

        var table = jQuery('.category-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            ajax: {
                url: BASE_URL +'/'+ ADMIN+'/category/gettable',
                type: 'POST',
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        
        $.validate({
            form : '#frm_category',
             onSuccess : function() {
                    $.ajax({
                            url: BASE_URL + '/'+ADMIN+'/category/add',
                            type: 'POST',
                            data: $('#frm_category').serialize(),
                            datatype: 'json',
                            success: function (data) {
                                var data = $.parseJSON(data);
                                if (data.status == 1) {
                                    $('.alert').show();
                                    $("#ins_category").modal("hide");
                                    $('#msg_main').html(data.msg);
                                    //$('#msg_main').attr('style', 'color:green;');
                                    $('#frm_category')[0].reset()
                                    admin.category.load_category();
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
                url: BASE_URL + '/'+ADMIN+ '/category/edit',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {

                        $("#category_id").val(data.content.id);
                        $("#category_name").val(data.content.name);
                        $("#description").val(data.content.description);

                        var status_id = $("#status").val(data.content.status);
                        status_id.attr("selected", "selected");
                        $("#ins_category").modal("show");
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
                        url: BASE_URL +  '/'+ADMIN+ '/category/delete',
                        type: 'POST',
                        data: {_token: admin.common.get_csrf_token_value(), id: id},
                        success: function (data) {
                            var data = $.parseJSON(data);
                            if (data.status == 1) {
                                $('.alert').show();
                                $('#msg_main').html(data.msg);
                               // $('#msg_main').attr('style', 'color:green;');
                                admin.category.load_category();
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