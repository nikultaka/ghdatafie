<!--Slider-->
<?php 
$setting = new \App\Helper\CommonHelper;
$banners = $setting->get_banner();
?>
@if($banners)
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider3">
            @foreach($banners as $banner)
            <li>
                <div class="slider-img1" style="background:url({{url(ASSET.'upload/image/banner/resize/'.$banner->banner)}}) no-repeat 0px 0px;">
                    <div class="container">
                        <div class="slider_banner_info_w3ls">
                            <h4>{{$banner->title}}</h4>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
         

        </ul>
    </div>
</div>
@endif
<div class="clearfix"> </div>
<!-- //Modal1 -->
<!--//Slider-->