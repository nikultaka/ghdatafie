admin.dataset = {

    initialize: function ()

    {

        function preview_infographic(input) {



            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#inphographic_image_priview').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }



        $("#infographic").change(function () {

            preview_infographic(this);

        });
        
        function preview_dataset_image(input) {



            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {
console.log(e);
                    $('#dataset_doc_preview').attr('href', e.target.result);
                    $('#dataset_doc_preview').css('display', 'block');

                }



                reader.readAsDataURL(input.files[0]);

            }

        }



        $("#dataset_image").change(function () {

            preview_dataset_image(this);

        });

        

        var this_class = this;



        $('body').on('click', '.btnDelete_dataset', function () {

            var id = $(this).data('id');

            this_class.delete_row(id);

        });



        admin.dataset.load_dataset();

        admin.dataset.refresh_validator();



//        $("#title").blur(function () {

//            var Text = $(this).val();

//            Text = Text.toLowerCase();

//            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');

//            $("#slug").val(Text);

//        });



//        var url = window.location.pathname;

//        var id = url.substring(url.lastIndexOf('/') + 1);

//        if ($.isNumeric(id)) {

//            this_class.get_details_foredit(id)

//        }



    },

//    get_details_foredit: function (id) {

//

//        if (id > 0) {

//            $.ajax({

//                url: BASE_URL +'/'+ ADMIN+'/reports/edit',

//                type: 'POST',

//                data: {_token: admin.common.get_csrf_token_value(), id: id},

//                success: function (data) {

//                    var data = $.parseJSON(data);

//                    if (data.status == 1) {

//                        $("#id").val(data.content.id);

//                        $("#title").val(data.content.title);

//                        $("#short_desc").val(data.content.short_desc);

//                        $("#price").val(data.content.price);

//                        $("#pages").val(data.content.pages);

//                        $("#language").val(data.content.language);

//                        $("#release_date").val(data.content.release_date);

//                        var status_id = $("#status").val(data.content.status);

//                        status_id.attr("selected", "selected");

//                    }

//                }

//

//            });

//        }

//        else {

//            return false;

//        }

//

//    },

    load_dataset: function () {



        var table = jQuery('.dataset-table').DataTable({

            paging: true,

            pageLength: 10,

            bDestroy: true,

            responsive: true,

            processing: true,

            serverSide: true,

            "order": [],

            ajax: {

                url: BASE_URL +'/'+ ADMIN+'/dataset/getdata',

                type: "POST",

                data: admin.common.get_csrf_toke_object_data()

            },

            "columnDefs": [

//                { "width": "25%", "targets": 2 },

//                { "width": "25%", "targets": 1 }

            ],

            columns: [

//                        { data: 'id', name: 'id'},

                {data: 'title_name', name: 'title_name'},

                {data: 'fld_dataset_title', name: 'fld_dataset_title'},

                {data: 'fld_shortdescription', name: 'fld_shortdescription'},

                {data: 'fld_dataset_publisher', name: 'fld_dataset_publisher'},

                {data: 'fld_dataset_maintainer', name: 'fld_dataset_maintainer'},

                {data: 'fld_dataset_maintainer_email', name: 'fld_dataset_maintainer_email'},

                {data: 'status', name: 'status'},

                {data: 'action', name: 'action', orderable: false, searchable: false},

            ],

        });



    },

    refresh_validator: function () {

        $.validate({

            modules : 'file',

            form: '#frm_dataset',

            onSuccess: function () {



                var form = $("#frm_dataset");



                // you can't pass Jquery form it has to be javascript form object

                var formData = new FormData(form[0]);

                var desc = CKEDITOR.instances['description'].getData();

                formData.append('description', desc)

                $.ajax({

                    type: 'POST',

                    url: BASE_URL + '/' + ADMIN + '/dataset/add',

                    data: formData,

                    datatype: 'json',

                    success: function (data) {

                        var data = $.parseJSON(data);

                        if (data.status == 1) {

                             window.location.href = BASE_URL +'/'+ ADMIN+'/dataset/list';

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

                    url: BASE_URL +'/'+ ADMIN+'/dataset/delete',

                    type: 'POST',

                    data: {_token: admin.common.get_csrf_token_value(), id: id},

                    success: function (data) {

                        var data = $.parseJSON(data);

                        if (data.status == 1) {

                            $('#msg_main').html(data.msg);

                            $('#msg_main').attr('style', 'color:green;');

                            admin.dataset.load_dataset();

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