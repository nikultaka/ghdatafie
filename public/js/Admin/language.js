admin.language = {
    initialize: function ()
    {
        

        $('#name').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });


        var this_class = this;

        $('body').on('click', '.btnDelete_language', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });
        $('body').on('click', '.btnEdit_language', function () {
            var id = $(this).data('id');
            this_class.edit_row(id);
        });
        admin.language.load_cms();
        admin.language.refresh_validator();

        
        $('#add_language_model').on('hidden.bs.modal', function () {
            $('#frm_language')[0].reset();
            $('#id').val('');
        });

    },
    load_cms: function () {

        var table = jQuery('.language-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,

            "order": [[1, "desc"]],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/language/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'gm_created', name: 'gm_created'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            form: '#frm_language',
            onSuccess: function () {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/' + ADMIN + '/language/add',
                    data: $('#frm_language').serialize(),
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                             window.location.href = BASE_URL +'/'+ ADMIN+'/language';
                        } else {
                            return false;
                        }
                    },
                });
            },
        });
    },
    delete_row: function (id) {

        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/language/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.language.load_cms();
                    }
                }
            });
        } else {
            return false;
        }

    },
    edit_row: function (id) {


        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/'+ADMIN+ '/language/edit',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {

                        $("#id").val(data.content.id);
                        $("#name").val(data.content.name);
                        var status_id = $("#status").val(data.content.status);
                        status_id.attr("selected", "selected");
                        $("#add_language_model").modal("show");
                    }
                }
            });
        }
        else {
            return false;
        }

    },
//    
};