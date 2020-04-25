@extends('Frontend.layouts.main')

@section('pageTitle',$cmsDetails[0]->title)
@section('pageHeadTitle',$cmsDetails[0]->title)
@section('headLink')


<link href="{{asset(ASSET.'frontend/css/base.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset(ASSET.'frontend/css/aboutUs.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="https://cdn.statcdn.com/static/css/fontawesome/4-7-0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<style>
/*    .sliderWrap {
        @import '<?php echo asset(ASSET."frontend/css/base.css"); ?>';
    }*/
/*    .sliderWrap {

    }*/
    .masterTestimonial > *  {
        /*color: red !important;*/
/*        @import '<?php echo asset(ASSET."frontend/css/base.css"); ?>';
        @import '<?php echo asset(ASSET."frontend/css/aboutUs.css"); ?>';*/
      }
</style>
<style>
    .border-top-gray10-1 {
        border-top: 1px solid #e6e6e6
    }
    #aboutUs .row {
    display: inline-block;
    width: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }
    .width50 {
    width: 50%;
}
.flex--spacing30 > .flex__item {
    padding-left: 30px;
    padding-bottom: 30px;
    float: none;
}
</style>

@endsection
@section('content')
<section class="content infographic-page">
<div class="content">
{!! html_entity_decode($cmsDetails[0]->description) !!}
</div>
    </section>

@if(!empty($testimonial))
<style>
    .section--medium {
        padding: 50px 120px;
    }
    .section {
        position: relative;
        display: block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0 -20px;
    }
    .width100 {
        width: 100%;
    }
    .text-center {
        text-align: center !important;
    }
    .font-size-xxl {
        font-size: 2.5rem;
    }
    .h1, h1 {
        margin: 0;
        padding: 0;
        line-height: 1.5em;
        font-weight: 400;
        font-size: 3rem;
    }
    .bold, b, strong {
        font-weight: 700;
    }
    .margin-bottom-30 {
        margin-bottom: 30px !important;
    }
    .display-block {
        display: block !important;
    }
    .width33 {
        width: 33.3333%;
    }
    .width0, .width10, .width100, .width15, .width20, .width25, .width30, .width33, .width35, .width40, .width45, .width5, .width50, .width55, .width60, .width65, .width66, .width70, .width75, .width80, .width85, .width90, .width95 {
        position: relative;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        float: left;
        min-height: 1px;
    }
    .margin-bottom-20 {
        margin-bottom: 20px !important;
    }
    .shortFacts__icon {
        position: relative;
        height: 94px;
        width: 94px;
        border: 1px solid #ccc;
        border-radius: 100%;
        vertical-align: top;
    }
    .font-size-250 {
        font-size: 250%;
    }
    .display-inline-block {
        display: inline-block !important;
    }
    .shortFacts__icon .fa-users {
        color: #7cc305;
    }
    .shortFacts__icon .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
    }
    .shortFacts__text {
        height: 94px;
        padding-left: 20px;
        vertical-align: top;
    }
    .font-size-xxl {
        font-size: 2.5rem;
    }
    .text-upper {
        text-transform: uppercase;
    }
    .font-size-s {
        font-size: .9rem;
    }
    .section--medium {
        padding: 50px 120px;
    }
    .section {
        position: relative;
        display: block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0 -20px;
    }
    .flex--spacing30 {
        margin-left: -30px;
        margin-bottom: -30px;
    }
    .flex {
        display: -webkit-box;
        display: flex;
        display: -ms-flexbox;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0;
            margin-bottom: 0px;
            margin-left: 0px;
        padding: 0;
        list-style: none;
    }
    .flex--spacing30 > .flex__item {
        padding-left: 30px;
        padding-bottom: 30px;
        float: none;
    }
    .panel-box, .panelBox {
        -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.1);
        box-shadow: 0 1px 4px rgba(0,0,0,.1);
        width: 100%;
        display: inline-block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 24px;
        background-color: #fff;
        border: 1px solid #e6e6e6;
        border-radius: 3px;
        -webkit-transition: .3s box-shadow;
        -o-transition: .3s box-shadow;
        transition: .3s box-shadow;
    }
    .flex {
        list-style: none;
    }
    i.border-radius {
        border-radius: 50%;
        border: 2px solid #f0f0f0;
        height: 40px;
        padding: 20px;
        text-align: center;
        vertical-align: middle;
        width: 40px;
        line-height: 40px;
    }
    .text-color--primary {
        color: #0b85e5 !important;
    }
    .hl-module {
        font-size: .9rem;
        letter-spacing: .025em;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 7px;
    }
    .services__link {
        position: absolute;
        bottom: 0;
        left: 0;
        width: calc(100% - 50px);
        margin: 0 25px 20px;
    }
    .text-bold {
        font-weight: 700 !important;
    }
</style>
<section class="content">
    <div class="container">    
<section class="section  hideMobile masterTestimonial border-top-gray10-1">

    <div class="sliderWrap">
        <div class="ms-partialview-template" id="partial-view-3">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($testimonial as $key=>$value)
                    @if($key == 0)
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    @else
                    <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                    @endif

                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($testimonial as $key=>$value)
                    @if($key == 0)
                    <div class="item active" style="padding: 10% 10% 0% 10%;">
                        <div class="width20 testimonialImage">
                            <img src="{{url(ASSET.'upload/testimonial/thumbnail/'.$value->user_photo)}}" alt="{{$value->customer_name}}">
                        </div>
                        <blockquote class="width75 float-right">
                            <q>{{$value->feedback}}</q>
                            <p class="margin-top-20"><b> {{$value->customer_name}}</b></p>
                        </blockquote>
                    </div>
                    @else
                    <div class="item" style="padding: 10% 10% 0% 10%;">
                        <div class="width20 testimonialImage">
                            <img src="{{url(ASSET.'upload/testimonial/thumbnail/'.$value->user_photo)}}" alt="{{$value->customer_name}}">
                        </div>
                        <blockquote class="width75 float-right">
                            <q>{{$value->feedback}}</q>
                            <p class="margin-top-20"><b> {{$value->customer_name}}</b></p>
                        </blockquote>
                    </div>
                    @endif

                    @endforeach
                </div>


                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

</section>
@endif
@if(!empty($services))
<section class="section section--medium bg-light" style="background: #fff;">
    <h3 class="margin-bottom-50 margin-bottom-s-30">Our <strong>services</strong></h3>
    <div class="row margin-bottom-30 margin-bottom-s-0 services services--en">
        <div class="flex flex--spacing30">
            @foreach($services as $key=>$value)
            <div class="flex__item width50">
                <div class="panel-box panelBox--hover text-center">
                    <img src="{{url(ASSET.'upload/image/thumbnail/'.$value->logo)}}">
                    <h4 class="hl-module">{{$value->title}}</h4>
                    <p class="margin-bottom-50 margin-bottom-s-10 text-color--gray text-left">{{ strip_tags(substr($value->description,0,150)).'...' }}</p>
                    <a href="/search/" target="_blank" rel="noopener" class="services__link text-bold">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i> Search our databases</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="section section--medium bg-light" style="background: #ececec;">
<div class="services-right-grids third_section">

    <div class="col-md-12">
        <h4 class="title-txt text-center" style="font-size:28px;margin-top:40px;">Our approach helps clients Understand their data and Information Assets Faster</h4>
        <div class="col-sm-4">
            <div class="service_discover_image">
                <div class="discover_text">
                    Quality
                </div>
                <img class="service-img1" src="{{url(ASSET.'frontend/images/discover.png')}}">
                <img src="{{url(ASSET.'frontend/images/right-arrow-(1).png')}}" class="img-responsive service_icon"> 
            </div>  

            <div class="show process_text">

                Clearly defining and documenting processes in place – setting out how things<span class="dots"></span><span class="morectnt"><span style="display:none;"> such as data quality reporting and data quality issue management should be handled. GHDatafie Consultancy Service can give you valuable assistance with your data quality issues, advice on available tooling , setting achievable targets and realising significant business benefit.

                    </span>&nbsp;&nbsp;<a href="" class="showmoretxt">Show More</a></span></div>
        </div>
        <div class="col-sm-4">
            <div class="service_discover_image">
                <div class="discover_text">
                    Measure
                </div>
                <img class="service-img1" src="{{url(ASSET.'frontend/images/step2.png')}}">
                <img src="{{url(ASSET.'frontend/images/right-arrow-(1).png')}}" class="img-responsive service_icon">
            </div> 
            <div class="show process_text">
                Applying cutting edge cost &amp; risk modeling techniques we qualify the true value <span class="dots"></span><span class="morectnt"><span style="display:none;">of improving your organisation's information Efficiency.
                    </span>&nbsp;&nbsp;<a href="" class="showmoretxt">Show More</a></span></div>
        </div>
        <div class="col-sm-4">
            <div class="service_discover_image">
                <div class="discover_text">
                    Manage
                </div>
                <img class="service-img1" src="{{url(ASSET.'frontend/images/step1.png')}}">
            </div>
            <div class="show process_text">
                By focusing on fundamentals we help you undertake meaningful and practical steps<span class="dots"></span><span class="morectnt"><span style="display:none;"> with a clear Return on investment.
                    </span>&nbsp;&nbsp;<a href="" class="showmoretxt">Show More</a></span></div>
        </div>


    </div>
<div class="col-md-12">
		                 <h4 class="title-txt text-center" style="font-size:28px;margin-top:40px;">Data Management Operations</h4>
                <p class="data_text">Whether you are looking to set-up, scale-up, scale down, move, transform or integrate your data management operation, GHDatafiecan advise and support you. We have extensive experience of successfully managing teams across Operations, Technology, and Change Management.</p>
		</div>
</div>
   
    </section>
    </div>
</section>

@endsection

@section('bottomscript')

@endsection