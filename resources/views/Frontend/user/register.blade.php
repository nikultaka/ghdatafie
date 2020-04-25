@extends('Frontend.new_layouts.inner_main')



@section('pageTitle','Register')

@section('pageHeadTitle','Register')



@section('content')

<link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/login-register.css')}}" />



<section class="content register_content" style="">

    <div class="container">    

        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <div class="panel panel-info">

                <div class="panel-heading" style="background-color: #424242; color: #ffffff;">

                    <div class="panel-title">Register</div>

                    <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#">Sign In</a></div>-->

                </div>  

                <div class="panel-body" >

                    <form id="register-form" action="#" onsubmit="return false;" method="post" role="form" class="form-sets form-horizontal" enctype="multipart/form-data">

                        {{ csrf_field() }}



                        <!--                                <div id="signupalert" style="display:none" class="alert alert-danger">

                                                            <p>Error:</p>

                                                            <span></span>

                                                        </div>-->



                        @if(!empty($user_role))
                            <div class="form-group">
                                <label for="username" class="col-md-3 control-label">Create as</label>
                            
                                <div class="col-md-9">
                                    <select class="form-control" name="user_type" id="user_type" style="height: auto;">
                                    @foreach($user_role as $user)
                                       <option value="{{ $user->role_id }}">{{ $user->type }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        
                        <div class="form-group">

                            <label for="username" class="col-md-3 control-label">Username</label>

                            <div class="col-md-9">

                                <input type="text" name="username" id="username" class="form-control" placeholder="Name" value="" data-validation="required">

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="email" class="col-md-3 control-label">Email</label>

                            <div class="col-md-9">

                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" data-validation="email">

                            </div>
                            <span class="help-block form-error" id="email_exist_error"></span>

                        </div>

                        <div class="form-group">

                            <label for="imgtoupload" class="col-md-3 control-label">Image</label>

                            <div class="col-md-6">

                                <input type="file" name="imgtoupload" id="imgtoupload" class="form-control-file" accept="image/*"

                                    data-validation="mime size" 

                                    data-validation-allowing="jpeg,png,jpg,gif,svg" 

                                    data-validation-max-size="2M"

                                    data-validation-error-msg-mime="You can only upload images">

                            </div>
                            <div class="col-md-3">
                                <img id="profile_pic" style="width: 100px;" src="">
                            </div>

                        </div>

<!--                        <div class="form-group">

                            <label for="" class="col-md-3 control-label"></label>

                            <div class="col-md-9">

                                <div class="form-group">

                                    <img id="profile_pic" style="width: 150px;" src="">

                                </div>

                            </div>

                        </div>-->

                        <div class="form-group">

                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-9">

                                <input type="password" name="pass_confirmation" id="password" class="form-control" placeholder="Password" data-validation="length" data-validation-length="min8">

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password" class="col-md-3 control-label">Confirm Password</label>

                            <div class="col-md-9">

                                <input type="password" name="pass" id="cpassword" class="form-control" placeholder="Confirm Password" data-validation="confirmation">

                            </div>

                        </div>



                        <div class="form-group">

                            <!--Button-->                                         

                            <div class="col-md-offset-3 col-md-9">

                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register btn-success" value="Register Now">

                            </div>

                        </div>

                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >

                            Already have an account! 

                            <a href="{{url('login')}}" >

                                Log In Here

                            </a>

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