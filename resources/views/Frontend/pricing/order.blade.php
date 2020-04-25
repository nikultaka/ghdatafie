@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')
<section class="content ">
    <div class="container">
        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <div class="row" style="padding: 25px;">
            <div class="col-md-12">
                <h2>Service for {{$packege->title}}</h2>
                <hr>
                
            </div>
            <div class="col-md-12">
                <p id="msg"></p>
                <form name="premiumRegister" id="premiumRegister" method="post" action="#" onsubmit="return false;" class="formGrid form_floatlabel">
                    {{ csrf_field() }}
                    <input type="hidden" id="package_name" name="package_name" value="{{$packege->title}}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select id="idGender" name="idGender" class="form-control" data-validation="required" style="height: 58px;padding: 17px;">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control" style="padding: 17px 0px 17px 12px;" placeholder="First Name" data-validation="required">
                        </div>
                        <div class="col-md-5 form-group">
                            <input type="text" id="lastname" name="lastname" class="form-control" style="padding: 17px 0px 17px 12px;" placeholder="Last Name" data-validation="required">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" id="phonenumbers" name="phonenumbers" class="form-control" style="padding: 17px 0px 17px 12px;" placeholder="Phone number at work" data-validation="number"> 
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" id="email" name="email"  class="form-control" style="padding: 17px 0px 17px 12px;" placeholder="Professional Email Address" data-validation="required">
                        </div>
                        
                        <div class="col-md-12 form-group" style="text-align: center;">
                            <button type="submit" id="submit" name="submit" class="button green btn btn-success">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/pricing.js')!!}"></script>
<script type="text/javascript">
$(document).ready(function () {
    frontend.pricing.initialize();
});
</script>
@endsection