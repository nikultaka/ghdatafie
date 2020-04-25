admin.blog = {
    initialize: function ()
    {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image_priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            readURL(this);
        });
        var this_class = this;

        $('body').on('click', '.btnDelete_blog', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        admin.blog.load_cms();
        admin.blog.refresh_validator();

        $("#title").blur(function () {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });

        

    },
   
    load_cms: function () {

        var table = jQuery('.blog-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,

            "order": [[0, "desc"]],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/blog/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'slug_url', name: 'slug_url'},
                {data: 'meta_title', name: 'meta_title'},
                {data: 'meta_keyword', name: 'meta_keyword'},
                {data: 'image', name: 'image'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            form: '#frm_blog',
            onSuccess: function () {

                var form = $("#frm_blog");

                // you can't pass Jquery form it has to be javascript form object
                var formData = new FormData(form[0]);
                var desc = CKEDITOR.instances['description'].getData();
                formData.append('description', desc)
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/' + ADMIN + '/blog/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                             window.location.href = BASE_URL +'/'+ ADMIN+'/blog/list';
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
                url: BASE_URL + '/' + ADMIN + '/blog/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.blog.load_cms();
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