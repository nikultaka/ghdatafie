<?php
$setting = new \App\Helper\CommonHelper;
?>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="f-bg-w3l">
            <div class="col-md-6 w3layouts_footer_grid pull-left menu_footer">
                <ul>
                    <li><a href="{{url('home')}}">Home</a></li>
                    <li><a href="{{url('data')}}">Data</a></li>
                    <li><a href="{{url('services')}}">Services</a></li>
                    <li><a href="interact.php">Interact</a></li>
                    <li><a href="{{url('news')}}">News</a></li>

                </ul>
            </div>

            <div class="col-md-4 w3layouts_footer_grid pull-right copyright_right">

                <p>{{$setting->get_setting_details('copyright','fild_value')}}</p>
            </div>
            <div class="clearfix"> </div>		
        </div>	
    </div>
</div>



<!-- Required Scripts -->
<!-- Common Js -->
<script type="text/javascript" src="{{asset(ASSET.'frontend/js/jquery-2.2.3.min.js')}}"></script>
<!--// Common Js -->
<!--search-bar-agileits-->
<script src="{{asset(ASSET.'frontend/js/main.js')}}"></script>
<!--//search-bar-agileits-->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset(ASSET.'frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset(ASSET.'frontend/js/easing.js')}}"></script>
<!-- Banner Responsive slider -->
<script src="{{asset(ASSET.'frontend/js/responsiveslides.min.js')}}"></script>
<!-- // Banner Responsive slider -->

<!-- flexSlider -->
<script defer src="{{asset(ASSET.'frontend/js/jquery.flexslider.js')}}"></script>
<!-- //flexSlider -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<!-- smooth scrolling -->

<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

<script src="{{asset(ASSET.'frontend/js/bootstrap.js')}}"></script>
<script src="{{asset(ASSET.'js/frontend/common.js')}}"></script>
@yield('bottomscript') 
<!--// Required Scripts -->