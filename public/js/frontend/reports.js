frontend.reports = {
    initialize: function ()
    {
        
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#inphographic_image_priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inphographic_image").change(function () {
            readURL(this);
        });
        
        var this_class = this;

        $('body').on('click', '.btnDelete_reports', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });

        frontend.reports.load_reports();

        frontend.reports.refresh_validator();
        
        $("body").on("blur", "#title_on_book_icon, #font_size_on_book_icon", function () {
            var id = $('#id').val();
            var book_title = $('#title_on_book_icon').val();
            var book_title_size = $('#font_size_on_book_icon').val();
            $.ajax({
                url: BASE_URL + '/reports/previewbookicon',
                type: 'POST',
                data:{_token: frontend.common.get_csrf_token_value(), "book_title":book_title, "book_title_size":book_title_size,"id":id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if(data.status == 1){
                        var image_path = BASE_URL + '/' + 'public/upload/reports/books_icon/'+data.image;
                        $('#book_icon_priview').attr('src', image_path);
                        $('#book_icon').val(data.file_name);
                    } else{
                        var image_path = BASE_URL + '/' + 'public/upload/reports/common_book_image.png';
                        $('#book_icon_priview').attr('src', image_path);
                        alert('error on creating book icon');
                    }
                },
                error: function () {
                    alert("error");
                },
                async: false
            });
        });


    },
    load_reports: function () {

        var table = jQuery('.reports-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            "scrollX": true,
            ajax: {
                url: BASE_URL + '/user/reports/getdata',
                type: "POST",
                data: frontend.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'cat_name', name: 'cat_name'},
                {data: 'short_desc', name: 'short_desc'},
                {data: 'price', name: 'price'},
                {data: 'pages', name: 'pages'},
                {data: 'language', name: 'language'},
                {data: 'release_date', name: 'release_date'},
                {data: 'downloads', name: 'downloads'},
                {data: 'popular_count', name: 'popular_count'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            modules: 'file',
            form: '#frm_reports',
            onSuccess: function () {

                var form = $("#frm_reports");

                // you can't pass Jquery form it has to be javascript form object
                var formData = new FormData(form[0]);
                var desc = CKEDITOR.instances['description'].getData();
                formData.append('description', desc)
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/user/reports/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            window.location.href = BASE_URL + '/user/report';
                        } else {
                            return false;
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            },
            onValidate: function ($form) {

                var obj = {};

                var id = $("#frm_reports #id").val();

                if (id == "") {
                    var infographic = $('#inphographic_image').val();
                    if (infographic == "") {
                        obj.element = $('#inphographic_image');
                        obj.message = "This is a required field";
                    }
                }
                return obj;
            }
        });
    },
    delete_row: function (id) {

        if (confirm("Are you sure ?")) {
            if (id > 0) {
                $.ajax({
                    url: BASE_URL + '/user/report/delete',
                    type: 'POST',
                    data: {_token: frontend.common.get_csrf_token_value(), id: id},
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg_main').html(data.msg);
                            $('#msg_main').attr('style', 'color:green;');
                            frontend.reports.load_reports();
                        }
                    }
                });
            }
        } else {
            return false;
        }

    },
};