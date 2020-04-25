admin.brand = {
    initialize: function ()
    {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#brand_logo_priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#brand_logo").change(function () {
            readURL(this);
        });
        var this_class = this;

        $('body').on('click', '.btnDelete_brand', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        admin.brand.load_cms();
        admin.brand.refresh_validator();

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
                url: BASE_URL + '/' + ADMIN + '/brand/edit',
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
        } else {
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
                url: BASE_URL + '/' + ADMIN + '/brand/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'slug_url', name: 'slug_url'},
                {data: 'meta_title', name: 'meta_title'},
                {data: 'meta_keyword', name: 'meta_keyword'},
                {data: 'logo', name: 'logo'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            form: '#frm_brand',
            onSuccess: function () {

                var form = $("#frm_brand");

                // you can't pass Jquery form it has to be javascript form object
                var formData = new FormData(form[0]);
                var desc = CKEDITOR.instances['description'].getData();
                formData.append('description', desc)
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/' + ADMIN + '/brand/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                             window.location.href = BASE_URL +'/'+ ADMIN+'/brand/list';
                        } else {
                            return false;
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            },
        });
    },
    delete_row: function (id) {

    if(confirm("Are you sure ?")){
        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/brand/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.brand.load_cms();
                    }
                }
            });
        }
    } else {
            return false;
        }

    },
//    
};