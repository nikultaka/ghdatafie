@extends('Frontend.new_layouts.inner_main')



@section('pageTitle','Login')

@section('pageHeadTitle','Login')



@section('content')



<link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/login-register.css')}}" />



<section class="content login_content">

    <div class="container" style="padding-top: 50px;">    

        <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    

            <div class="panel panel-info" style="margin-bottom: 0px;">

                <div class="panel-heading" style="background-color: #424242; color: #ffffff;">

                    <div class="panel-title">Log In</div>

                    <!--<div style="float:right; font-size: 11px; position: relative; top:-20px"><a href="{{url('forgot_password')}}" style="color: white;">Forgot password?</a></div>-->

                </div>     



                <div style="padding-top:30px" class="panel-body" >



                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    

                        @foreach (['danger', 'warning', 'success', 'info'] as $key)

                        @if(Session::has($key))

                            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>

                        @endif

                       @endforeach



                    <form id="login-form-" action="login"  method="post" role="form" class="form-sets form-horizontal" >

                        {{ csrf_field() }}        

                        <div style="margin-bottom: 25px" class="input-group">

                            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->

                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="" data-validation="email" placeholder="Email" required="required">

                        </div>



                        <div style="margin-bottom: 25px" class="input-group">

                            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->

                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" data-validation="required" required="required">

                        </div>



                        <p id="login_msg"></p>

                        <div style="margin-top:10px" class="form-group">

                            <!-- Button -->



                            <div class="col-sm-6 controls col-sm-offset-3">

                                <input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-login btn-success" value="Log In">

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-12 control">

                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >

                                    Don't have an account! 

                                    <a href="{{url('register')}}" >

                                        Register Here

                                    </a>

                                </div>

                                <div style="font-size:85%" >

                                    <a href="{{url('forgot_password')}}" style="">Forgot password?</a>

                                </div>

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