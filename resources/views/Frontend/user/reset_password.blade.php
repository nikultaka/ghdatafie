@extends('Frontend.new_layouts.inner_main')

@section('pageTitle','Login')
@section('pageHeadTitle','Login')

@section('content')
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style>
    .inner-pages .content .container {
        background: transparent;
        border: none;
    }
    .panel-info {
        border-color: lightgray;
    }
</style>

<section class="content ">
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading" style="background-color: #424242; color: #ffffff;">
                    <div class="panel-title">Reset password</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="reset_pass_form" name="reset_pass_form" action=""  method="post" role="form" class="form-sets form-horizontal" onsubmit="return false;">
                        {{ csrf_field() }}        

                        <input type="hidden" name="hdn_id" name="hdn_id" value="<?php echo $id;?>">
                        <div>
                            <label>Enter New password</label>
                        </div>

                        <div style="margin-bottom: 25px;" class="input-group">
                            <input type="password" name="pass_confirmation" id="pass_confirmation" class="form-control" placeholder="Enter New Password" data-validation="length" data-validation-length="min8">
                        </div>
                        
                        <div>
                            <label>Confirm New password</label>
                        </div>
                        <div style="margin-bottom: 25px;" class="input-group">
                            <input type="password" name="pass" id="con_pass" class="form-control" placeholder="Confirm New Password" data-validation="confirmation">
                        </div>

                        <p id="pass_msg"></p>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-6 controls col-sm-offset-3">
                                <center><input type="submit"  class="btn btn-login btn-success reset_pass" value="Submit"></center>
                            </div>
                        </div>
                        
                    </form>     

                </div>                     
            </div>  
        </div>
    </div>
</section>

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/user.js')!!}"></script>
<script type="text/javascript">
$(document).ready(function () {
    frontend.user.initialize();
});
</script>
@endsection