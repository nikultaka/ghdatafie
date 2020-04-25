@extends('Frontend.new_layouts.inner_main')

@section('pageTitle','Login')
@section('pageHeadTitle','Login')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/login-register.css')}}" />

<section class="content forgot_content">
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading" style="background-color: #424242; color: #ffffff;">
                    <div class="panel-title">Forgot password?</div>
                    <!--<div style="float:right; font-size: 11px; position: relative; top:-20px"><a href="#" style="color: white;">Forgot password?</a></div>-->
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="forgot_pass_form" name="forgot_pass_form" action=""  method="post" role="form" class="form-sets form-horizontal" onsubmit="return false;">
                        {{ csrf_field() }}        

                        <div>
                            <p>Enter your email we will send a link to reset your password.</p>
                        </div>

                        <div style="margin-bottom: 25px;" class="input-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="" data-validation="email">
                        </div>

                        <p id="email_msg"></p>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-6 controls col-sm-offset-3">
                                <input type="submit" name="login-submit"  class="btn btn-login btn-success sub_email" value="Send Email">
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