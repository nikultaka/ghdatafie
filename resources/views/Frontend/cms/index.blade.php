@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$cmsDetails[0]->title)
@section('pageHeadTitle',$cmsDetails[0]->title)
@section('headLink')
@endsection
@section('content')
@if(\Request::is('services'))

<link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/testimonial.css')}}" />
<!--<script src="{{asset(ASSET.'new_frontend/js/move-top.js')}}" type="text/javascript" charset="utf-8"></script>-->
<!--<section class="w3-agile-services">
<div class="container">
<?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?> 
{!! html_entity_decode($cmsDetails[0]->description) !!}
</div>
    </section>-->

<section class="content ">
    <div class="container">
        <?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?> 
        <div class="section-title text-left">
            <h2>GHDatafie Consultancy</h2>
            <p>Our partners help you to use data to tranform your business. We work with you to understand your goals and map up strategies to achieving them. Our expertise are in assiting firms in managing strategic and compex enterprise data management challenges in a practical and effective way.</p>
            <hr>
        </div>

        <div class="row pb-4">
            <div class="col-sm-4">
                <img src="{{asset(ASSET.'frontend/images/idea.png')}}" alt=""></div>
            <div class="col-sm-8 pt-5">
                <h3 class="">WE HELP YOU TO PRACTICALLY GAIN INSIGHTS FROM YOUR DATA USING BOTH PROVEN AND INNOVATIVE TECHNIQUES</h3>
            </div>
        </div>
        
        <div class="row bg-light pt-5 pb-5 text-center" id="our-services">

            <div class="col-sm-12 pb-3"><h3>We offer the following of insight services
                </h3></div>
            @if(!empty($services))
            @foreach($services as $key=>$value)
            <div class="col-sm-3">
                <div class="services-box">
<!--                    <a href="">    -->
                        <i><img src="{{url(ASSET.'upload/image/thumbnail/'.$value->logo)}}" alt=""></i>
                        <h4>{{$value->title}}</h4>
<!--                        <p>View Detail <img src="{{url(ASSET.'frontend/images/arrow.svg')}}" alt=""></p>-->
<!--                    </a>    -->
                </div>
            </div>
            @endforeach
            @endif

        </div>
        @if(!empty($testimonial))
        <div class="testimonials" id="testimonials">
		<div class="container" >
			<div class="phpkida_testimonials_grids">
				 <section class="center slider">
                                     @foreach($testimonial as $key=>$testimonial_value)
						<div class="agileits_testimonial_grid">
							<div class="pk_testimonial_grid">
								<p>{{isset($testimonial_value->feedback) ? $testimonial_value->feedback : '' }}</p>
								<h4>{{isset($testimonial_value->customer_name) ? $testimonial_value->customer_name : '' }}</h4>
								<div class="pk_testimonial_grid_pos">
                                                                    <?php 
                                                                        if(isset($testimonial_value->user_photo)){
                                                                            $user_pic = ASSET.'upload/testimonial/thumbnail/'.$testimonial_value->user_photo;
                                                                        }else{
                                                                            $user_pic = ASSET.'upload/testimonial/NoPhoto.jpg';
                                                                        }
                                                                    ?>
									<img src="{{url($user_pic)}}" alt="{{$testimonial_value->customer_name}} " class="img-responsive" />
								</div>
							</div>
						</div>
                                     @endforeach
				</section>
			</div>
		</div>
	</div>
        <hr>
        @endif
        
        <div class="row pt-5 pb-5 text-center information-sec">

            <div class="col-sm-12 pb-3"><h3>Our approach helps clients Understand their data and Information Assets Faster

                </h3></div>
            <div class="col-sm-4">
                <div class="services-box">  <img src="{{url(ASSET.'frontend/images/step1.png')}}" alt="">
                    <h4>Quality</h4>
                    <p>Clearly defining and documenting processes in place – setting out how things  </p>
                    <p><a href=""> Show More <img src="{{url(ASSET.'frontend/images/arrow.svg')}}" alt=""></a></p>
                </div></div>
            <div class="col-sm-4">
                <div class="services-box">   <img src="{{url(ASSET.'frontend/images/step2.png')}}" alt="">
                    <h4>Measure</h4>
                    <p>Applying cutting edge cost &amp; risk modeling techniques we qualify the true value  </p>
                    <p><a href=""> Show More <img src="{{url(ASSET.'frontend/images/arrow.svg')}}" alt=""></a></p>
                </div></div>
            <div class="col-sm-4">
                <div class="services-box"> <img src="{{url(ASSET.'frontend/images/step3.png')}}" alt="">
                    <h4>Manage</h4>
                    <p>By focusing on fundamentals we help you undertake meaningful and practical steps</p>
                    <p><a href=""> Show More <img src="{{url(ASSET.'frontend/images/arrow.svg')}}" alt=""></a></p>
                </div></div>
        </div>
        <hr>

        <div class="row pt-5 pb-5 ">

            <div class="col-sm-12 pb-3"><h3 class="pb-2">Data Management Operations


                </h3>
                <p>Whether you are looking to set-up, scale-up, scale down, move, transform or integrate your data management operation, GHDatafiecan advise and support you. We have extensive experience of successfully managing teams across Operations, Technology, and Change Management.</p>
            </div>



        </div>

    </div>
</section>

@endif
@endsection

@section('bottomscript')
<script src="{{asset(ASSET.'new_frontend/js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).on('ready', function() {
	  $(".center").slick({
		dots: true,
		infinite: true,
		centerMode: true,
		slidesToShow: 2,
		slidesToScroll: 2,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows: true,
				centerMode: false,
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: true,
				centerMode: false,
				centerPadding: '50px',
				slidesToShow: 1
			  }
			}
		 ]
	  });
	});
  
</script>
<script src="{{asset(ASSET.'new_frontend/js/move-top.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection