@extends('Frontend.layouts.main')

@section('pageTitle','Login')
@section('pageHeadTitle','Login')

@section('content')
<div class="login_register">
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{Auth::user()->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="{{Auth::user()->name}}" src="{{url(ASSET.'upload/image/profile/resize/'.Auth::user()->profile_pic)}}" class="img-circle img-responsive"> </div>
              
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{Auth::user()->email}}</td>
                      </tr>
                      <tr>
                        <td>Created Date</td>
                        <td>{{date('Y-m-d',strtotime(Auth::user()->created_at))}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/user.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        frontend.user.initialize();
    });
</script>
@endsection