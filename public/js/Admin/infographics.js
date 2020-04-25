admin.infographics = {
    initialize: function ()
    {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#infographics_image_priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#infographics_image").change(function () {
            readURL(this);
        });
        var this_class = this;

        $('body').on('click', '.btnDelete_infographics', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        admin.infographics.load_infographics();
        admin.infographics.refresh_validator();

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
    load_infographics: function () {

        var table = jQuery('.infographics-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            "order": [],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/infographics/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            "columnDefs": [
                { "width": "25%", "targets": 2 },
//                { "width": "25%", "targets": 1 }
            ],
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'sc_name', name: 'sc_name'},
                {data: 'short_desc', name: 'short_desc'},
//                {data: 'description', name: 'description'},
                {data: 'publish_date', name: 'publish_date'},
                {data: 'infographics_image', name: 'infographics_image' ,orderable: false, searchable: false},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            modules : 'file',
            form: '#frm_infographics',
            onSuccess: function () {

                var form = $("#frm_infographics");

                // you can't pass Jquery form it has to be javascript form object
                var formData = new FormData(form[0]);
                var desc = CKEDITOR.instances['description'].getData();
                formData.append('description', desc)
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/' + ADMIN + '/infographics/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                             window.location.href = BASE_URL +'/'+ ADMIN+'/infographics/list';
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
                    url: BASE_URL + '/' + ADMIN + '/infographics/delete',
                    type: 'POST',
                    data: {_token: admin.common.get_csrf_token_value(), id: id},
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg_main').html(data.msg);
                            $('#msg_main').attr('style', 'color:green;');
                            admin.infographics.load_infographics();
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