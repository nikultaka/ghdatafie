admin.banner = {
    initialize: function ()
    {
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#banner_image_priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#page_name').on('change',function (){
            if($(this).val() == '-1' ){
                $('#add_page_name').show();
            }else{
                $('#add_page_name').hide();
            }
        })
        $("#banner_image").change(function () {
            readURL(this);
        });
        var this_class = this;

        $('body').on('click', '.btnDelete_banner', function () {
            var id = $(this).data('id');
            this_class.delete_row(id);
        });
        $('body').on('click', '.btnEdit_banner', function () {
            var id = $(this).data('id');
            this_class.edit_row(id);
        });
        admin.banner.load_cms();
        admin.banner.refresh_validator();

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
        $('#add_banner_model').on('hidden.bs.modal', function () {
            $('#frm_banner')[0].reset();
            $('#id').val('');
            $('#banner_image_priview').attr('src',BASE_URL+'/'+ASSET+'upload/'+$("#default_image").val());
        });

    },
    get_details_foredit: function (id) {

        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/banner/edit',
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

        var table = jQuery('.banner-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/banner/getdata',
                type: "POST",
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
//                        { data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'page_name', name: 'page_name'},
                {data: 'banner', name: 'banner'},
                {data: 'gm_created', name: 'gm_created'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
    refresh_validator: function () {
        $.validate({
            form: '#frm_banner',
            onSuccess: function () {
                var form = $("#frm_banner");
                var formData = new FormData(form[0]);
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + '/' + ADMIN + '/banner/add',
                    data: formData,
                    datatype: 'json',
                    success: function (data) {
                        var data = $.parseJSON(data);
                        if (data.status == 1) {
                            $("#add_banner_model").modal("hide");
                             admin.banner.load_cms();
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
                url: BASE_URL + '/' + ADMIN + '/banner/delete',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {
                        $('#msg_main').html(data.msg);
                        $('#msg_main').attr('style', 'color:green;');
                        admin.banner.load_cms();
                    }
                }
            });
        } 
    } else {
        return false;
    }

    },
    edit_row: function (id) {


        if (id > 0) {
            $.ajax({
                url: BASE_URL + '/'+ADMIN+ '/banner/edit',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(), id: id},
                success: function (data) {
                    var data = $.parseJSON(data);
                    if (data.status == 1) {

                        $("#id").val(data.content.id);
                        $("#title").val(data.content.title);
                        $("#page_name").hide();
                        $("#add_page_name").show();
                        $("#add_page_name").val(data.content.page_slug);
                        
                        if(data.content.banner != ''){
                            $('#banner_image_priview').attr('src',BASE_URL+'/'+ASSET+'upload/image/banner/resize/'+data.content.banner);
                        } else {
                            $('#banner_image_priview').attr('src',BASE_URL+'/'+ASSET+'upload/'+$("#default_image").val());
                        }
                        var status_id = $("#status").val(data.content.status);
                        status_id.attr("selected", "selected");
                        $("#add_banner_model").modal("show");
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