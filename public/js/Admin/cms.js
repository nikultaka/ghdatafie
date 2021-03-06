admin.cms = {
    initialize: function ()
    {
        var this_class = this;

        $('body').on('click', '.btnDelete_cms', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        admin.cms.load_cms();
        admin.cms.refresh_validator();

        $("#title").blur(function () {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });

        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);
        if ($.isNumeric(id)) {
            this_class.get_details_foredit(id)
        }

    },
    get_details_foredit: function (id) {

        if (id > 0) {
            $.ajax({
                url: BASE_URL +'/'+ ADMIN+'/cms/edit',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $("#id").val(data.content.id);
                        $("#title").val(data.content.title);
                        $("#slug").val(data.content.slug_url);
                        $("#description").val(data.content.description);
                        $("#meta_title").val(data.content.meta_title);
                        $("#meta_keyword").val(data.content.meta_keyword);
                        $("#meta_description").val(data.content.meta_description);
                        var status_id = $("#status").val(data.content.status);
                        status_id.attr("selected", "selected");
                    }
                }

            });
        }
        else {
            return false;
        }

    },
    load_cms: function () {

        var table = jQuery('.cms-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            ajax: {
                url: BASE_URL +'/'+ ADMIN+'/cms/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'slug_url', name: 'slug_url'},
                {data: 'meta_title', name: 'meta_title'},
                {data: 'meta_keyword', name: 'meta_keyword'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            form : '#frm_cms',
             onSuccess : function() {
                 for (instance in CKEDITOR.instances) 
                    {
                        CKEDITOR.instances['description'].updateElement();
                    }
                    $.ajax({
                        type: 'POST',
                        url: BASE_URL +'/'+ ADMIN+'/cms/add',
                        data: $('#frm_cms').serialize(),
                        datatype: 'json',
                        success: function (data) {
                            var data = $.parseJSON(data);
                            if (data.status == 1) {
                                window.location.href = BASE_URL +'/'+ ADMIN+'/cms/list';
                            }
                            else {
                                return false;
                            }
                        }
                    });
              },
          });
    },
    delete_row: function (id) {

        if (id > 0) {
            $.ajax({
                url: BASE_URL +'/'+ ADMIN+'/cms/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.cms.load_cms();
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