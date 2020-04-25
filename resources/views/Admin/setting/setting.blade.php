@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Contact Details')
@section('pageHeadTitle','Contact Details')
@section('content')

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Contact Details</h3>

            <div class="box-tools pull-right">
            </div>
            <p id="msg_main"></p>
        </div>
        <div class="box-body">
            <div class="card card-primary">
                <form role="form" method="post" enctype="multipart/form-data" id="logo_upload_form" name="logo_upload_form" onsubmit="return false;" > 
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div id="image_preview"><img id="previewing" src="<?php echo isset($contact_image) ? url(ASSET.'/upload/image/thumbnail/' . $contact_image->fild_value) : '' ?>" style="width: 100px;" /></div>
                        <input type="hidden" name="logo_image_name" id="logo_image_name" value="">
                        <div class="form-group">
                            <label for="exampleInputFile">Select image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="contact_image_upload" name="contact_image_upload">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input class="form-control" id="contact_name" name="contact_name" placeholder="contact name" value="{{isset($contact_name->fild_value) ? $contact_name->fild_value : ""}}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Post</label>
                            <input class="form-control" id="contact_post" name="contact_post" placeholder="contact post" value="{{isset($contact_post->fild_value) ? $contact_post->fild_value : ""}}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input class="form-control" id="contact_email" name="contact_email" placeholder="Email" value="{{isset($contact_email->fild_value) ? $contact_email->fild_value : ""}}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input class="form-control" id="contact_number" name="contact_number" placeholder="contact number" value="{{isset($contact_number->fild_value) ? $contact_number->fild_value : ""}}" type="text">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <p id="msg" style="color: green;" ></p>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</section>
<!-- /.content -->

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/site_setting.js')!!}"></script>
<script type="text/javascript">
                    $(document).ready(function () {
                        admin.site_setting.initialize();
                    });
</script>
@endsection