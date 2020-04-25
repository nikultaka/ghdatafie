
@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')

<section class="content infographic-page">
    <div class="container">   
        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <div class="infographics-slider row">
            <div class="col-sm-12">
                @if(!$lastWeekNews->isEmpty())
                <div class="infographic slider">
                    @foreach ($lastWeekNews as $WeekNews)

                    <div class="slider-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{url('news/'.$WeekNews->id)}}">
                                <?php
                                if (isset($WeekNews->image) && $WeekNews->image != '') {
                                    $url = ASSET . 'upload/news/thumbnail/' . $WeekNews->image;
                                } else {
                                    $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                                }
                                ?>
                                    <img class="img-fluid" alt="" src="{{url($url)}}" style="min-height: 325px;max-height: 325px;">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="pt-5">{{$WeekNews->title}}</h4>
                                <p class="pt-3">
                                    {{$WeekNews->short_desc}}
                                </p>
                                <hr/>
                                <p><span class="date">
                                        <?php echo date("M d, Y", strtotime($WeekNews->publish_date)); ?>
                                    </span> | <span><a href="{{url('news/category/'.$WeekNews->cat_id)}}">{{$WeekNews->category_name}}</a></span> 
                                    <span class="pull-right" style="padding-right: 20px;">
                                        by {{$WeekNews->username}}
                                    </span>
                                </p>

                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                @else
                    <center>No Data available.</center>
                @endif

            </div></div>    
        <div class="page-filter row">
            <div class="col-sm-12">
                <h4 class="text-center mb-3">Popular News Topics</h4>
                <ul class="">
                    @if(!empty($news_category))
                    @foreach($news_category as $news_cat)
                    <li><a href="{{url('news/category/'.$news_cat->id)}}" class="btn btn-info text-white">{{$news_cat->name}}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="row bg-light pt-5 pb-5">

            @if(!$news->isEmpty())
            <div class="col-md-8">
                <h4>     CURRENT NEWS</h4> 

                <div id="news_container">
                    @include('Frontend.news.load')
                </div>
            </div>
            <div class="col-md-4">
                <div class="white-box">

                    @if(!empty($default_cat))
                    <div class="sidebar-title">
                        <h4>{{$default_cat['categoty_name']}}</h4>
                    </div>            

                    <ul class="listContent">
                        @if(!empty($default_cat['total']))
                        @foreach($default_cat['total'] as $default)

                        <li class="listContent__item"><a href="">
                                <div class="row">
                                    <div class="col-sm-3 pr-0">
                                        <?php
                                        if (isset($default->image) && $default->image != '') {
                                            $url = ASSET . 'upload/news/thumbnail/' . $default->image;
                                        } else {
                                            $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                                        }
                                        ?>
                                        <img alt="" src="{{url($url)}}" style="min-width: 71px;max-height: 51px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <h6>{{$default->short_desc}}</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                        @endif
                </div>
            </div>
            @else
            <div class="col-md-12">
                <center>No Data available.</center>
            </div>
            @endif
        </div>

<!--        <div class="row">
            <div class="col-sm-12"><div class="section-title text-center">
                    <h2>Any more questions?
                    </h2>
                    <h3>Get in touch with us quickly and easily. 
                        We are happy to help!</h3>
                </div></div>  

        </div>
        <div class="row pt-3">
            <div class="col-sm-6">
                <div class="get-intouch-box">    <h3>Do you still have questions?</h3>

                    <div class="contactCards__item contactCards__item--1">
                        <p>Feel free to contact us anytime using our <a href="">contact form</a> or visit our <a href="">FAQ page</a>.</p>

                    </div></div>


            </div>
            <div class="col-sm-6">
                <div class="get-intouch-box">    
                    <h3>Your contact to the Infografik Newsroom</h3>

                    <div class="contactCards__item contactCards__item--1">
                        <img src="{{asset(ASSET.'new_frontend/img/367.jpg')}}" class="contactCards__avatar" alt="ContactEsther Shaulova">
                        <div class="flex--grow">
                            <h4 class="contactCards__title">Felix Richter</h4>
                            <h5 class="contactCards__position">Data Journalist</h5>
                            <div class="contactCards__mail">
                                <div class="margin-bottom-5">
                                    <div class="contactCards__mail--prefix">Email</div>
                                    <a href="mailto:support@ghdatafie.com">felix.richter@ghdatafie.com</a></div>
                                <div>
                                    <div class="contactCards__mail--prefix">Tel</div>
                                    <a href="tel:+4940284841557">+49(40)284841557</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>-->

<!--        <div class="row bg-secondary pt-5 pb-5 mt-3">
            <div class="col-sm-2 offset-sm-2"><img src="{{asset(ASSET.'new_frontend/img/infographic-content-design-en-360.png')}}" alt="" class="img-fluid" /></div>
            <div class="col-sm-6 text-white">
                <h4>Ghdatafie Content & Information Design
                </h4>
                <p class="text-white">Research, storytelling, infographics & presentation design on any topic in your corporate design.</p>
                <a href="" class="btn btn-light">More Information</a>
            </div>

        </div>-->
    </div>
</section>
   
@endsection
@section('bottomscript')
<script type="text/javascript">

	$(window).on('hashchange', function() {
            if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getData(page);
                    }
            }
        });

	$(document).ready(function() {
	     $(document).on('click', '.pagination a',function(event){
	        event.preventDefault();
	        $('li').removeClass('active');
	        $(this).parent('li').addClass('active');
	        var myurl = $(this).attr('href');
	        var page=$(this).attr('href').split('page=')[1];
	        getData(page);
	    });
	});

	function getData(page){
	        $.ajax({
	            url: '?page=' + page,
	            type: "get",
	            datatype: "html"
	        })
	        .done(function(data){
	            $("#news_container").empty().html(data);
//	            location.hash = page;
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError){
	              alert('No response from server');
	        });
	}

</script>




<!--<script src="{!! asset(ASSET.'js/frontend/dataset.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
       // frontend.dataset.initialize();
    });
</script>-->
@endsection