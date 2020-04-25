admin.reports = {
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
        $('#report_filter').on('change', function () {
            admin.reports.load_reports();
        })
        $('#example-select-all').on('click', function () {
            // Get all rows with search applied
            var rows = table.rows({'search': 'applied'}).nodes();
            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });
        $('.reports-table tbody').on('change', 'input[type="checkbox"]', function () {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });
        $('.selected-report-approved').on('click', function (e) {

            var selected = [];

            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function () {
                // If checkbox is checked
                if (this.checked) {
                    // Create a hidden element
                    var data = this.value
                    selected.push(data);

                }
            });
            if (selected.length > 0) {
                $.ajax({
                    url: BASE_URL + '/' + ADMIN + '/reports/status_apporovied',
                    type: 'POST',
                    data: {_token: admin.common.get_csrf_token_value(), id: selected},
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg_main').html(data.msg);
                            $('#msg_main').attr('style', 'color:green;');
                            admin.reports.load_reports();
                        }
                    }
                });
            } else {
                $('#msg_main').html("Please select report to approve.");
                $('#msg_main').attr('style', 'color:red;');
            }

        });
        
        $('.selected-report-rejected').on('click', function (e) {

            var selected = [];

            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function () {
                // If checkbox is checked
                if (this.checked) {
                    // Create a hidden element
                    var data = this.value
                    selected.push(data);

                }
            });
            if (selected.length > 0) {
                $.ajax({
                    url: BASE_URL + '/' + ADMIN + '/reports/status_rejected',
                    type: 'POST',
                    data: {_token: admin.common.get_csrf_token_value(), id: selected},
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg_main').html(data.msg);
                            $('#msg_main').attr('style', 'color:green;');
                            admin.reports.load_reports();
                        }
                    }
                });
            } else {
                $('#msg_main').html("Please select report to reject.");
                $('#msg_main').attr('style', 'color:red;');
            }

        });
        var table = jQuery('.reports-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            'columnDefs': [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
                    }
                }],
            "order": [],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/reports/getdata',
                type: "POST",
                data: {_token: admin.common.get_csrf_token_value(), "filter_status": $('#report_filter').val()},
                "dataSrc": function (json) {
                    if (json.role == 2) {
                        table.column(0).visible(false);
                    }
                    $('.reports-table').show();
                    return json.data;
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'created_by', name: 'created_by'},
                {data: 'cat_name', name: 'cat_name'},
                {data: 'price', name: 'price'},
                {data: 'pages', name: 'pages'},
                {data: 'language', name: 'language'},
                {data: 'release_date', name: 'release_date'},
                {data: 'downloads', name: 'downloads'},
                {data: 'views', name: 'views'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
//        admin.reports.load_reports();
        admin.reports.refresh_validator();

        $("body").on("blur", "#title_on_book_icon, #font_size_on_book_icon", function () {
            var id = $('#id').val();
            var book_title = $('#title_on_book_icon').val();
            var book_title_size = $('#font_size_on_book_icon').val();
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/reports/previewbookicon',
                type: 'POST',
                data:{_token: admin.common.get_csrf_token_value(), "book_title":book_title, "book_title_size":book_title_size,"id":id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if(data.status == 1){
                        var image_path = BASE_URL + '/' + 'public/upload/reports/books_icon/'+data.image;
                        $('#book_icon_priview').attr('src', image_path);
                        $('#book_icon').val(data.file_name);
                    } else{
                        var image_path = BASE_URL + '/' + 'public/upload/reports/common_book_image.png';
                        $('#book_icon_priview').attr('src', image_path);
                        console.log('error on creating book icon');
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
            'columnDefs': [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
                    }
                }],
            "order": [],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/reports/getdata',
                type: "POST",
                data: {_token: admin.common.get_csrf_token_value(), "filter_status": $('#report_filter').val()},
                "dataSrc": function (json) {
                    if (json.role == 2) {
                        table.column(0).visible(false);
                    }
                    $('.reports-table').show();
                    return json.data;
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'created_by', name: 'created_by'},
                {data: 'cat_name', name: 'cat_name'},
                {data: 'price', name: 'price'},
                {data: 'pages', name: 'pages'},
                {data: 'language', name: 'language'},
                {data: 'release_date', name: 'release_date'},
                {data: 'downloads', name: 'downloads'},
                {data: 'views', name: 'views'},
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
                    url: BASE_URL + '/' + ADMIN + '/reports/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            window.location.href = BASE_URL + '/' + ADMIN + '/reports/list';
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
                    url: BASE_URL + '/' + ADMIN + '/reports/delete',
                    type: 'POST',
                    data: {_token: admin.common.get_csrf_token_value(), id: id},
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $('#msg_main').html(data.msg);
                            $('#msg_main').attr('style', 'color:green;');
                            admin.reports.load_reports();
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