<?php 
$footer_data = (new \App\Helper\CommonHelper)->footer_data(); 
$setting = new \App\Helper\CommonHelper;
?>
<!-- Footer -->
<footer>
    <div class="footer-links">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-3">
                    <h3>DATASET</h3>
                    @if(!empty($footer_data['dataset_footer']))
                    <ul class="links">
                        @foreach($footer_data['dataset_footer'] as $dataset)
                        <li><a href="{{url('datasets/'.$dataset->br_id)}}">{{$dataset->br_name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-sm-4 col-lg-3">
                    <h3>REPORTS</h3>
                    @if(!empty($footer_data['reports_footer']))
                    <ul class="links">
                        @foreach($footer_data['reports_footer'] as $reports)
                        <li><a href="{{url('reports/'.$reports->sc_id)}}">{{$reports->sc_name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-sm-4 col-lg-3">
                    <h3>INFOGRAPHICS</h3>
                    @if(!empty($footer_data['infographics_footer']))
                    <ul class="links">
                        @foreach($footer_data['infographics_footer'] as $infographics)
                        <li><a href="{{url('infographics/category/'.$infographics->sc_id)}}">{{$infographics->sc_name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
               
                <div class="col-sm-4 col-lg-3">
                    <h3>GHDATAFIE</h3>
                    <ul class="links">
                        <li><a href="{{url('services')}}">AboutUs</a></li>
                        <li><a href="{{url('services')}}#our-services">Our services</a></li>
                        <li><a href="{{url('services')}}#testimonials">Testimonial</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="follow-text"><strong>Follow us</strong> on social media or subscribe to our newsletter for more business insights.</div>
                    </div>
                    <div class="col-sm-4">
                        <ul class="social-links">
                            <li><a href="{{$setting->get_setting_details('facebook','fild_value')}}" class="socialMediaButton" target="_blank">{!! $setting->get_setting_details('facebook','label') !!}</a></li>
                            <li><a href="{{$setting->get_setting_details('twitter','fild_value')}}" class="socialMediaButton" target="_blank">{!! $setting->get_setting_details('twitter','label') !!}</a></li>
                            <li><a href="{{$setting->get_setting_details('google-plus','fild_value')}}" class="socialMediaButton" target="_blank">{!! $setting->get_setting_details('google-plus','label') !!}</a></li>
                            <li><a href="{{$setting->get_setting_details('linkedin','fild_value')}}" class="socialMediaButton" target="_blank">{!! $setting->get_setting_details('linkedin','label') !!}</a></li>
                            <li><a href="{{$setting->get_setting_details('instagram','fild_value')}}" class="socialMediaButton" target="_blank">{!! $setting->get_setting_details('instagram','label') !!}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer --> 
<script src="https://code.jquery.com/jquery-3.0.0.slim.js" integrity="sha256-Gp6hp0H+A7axg1tErCucWeOc38irtkVWpUbBZSj8KCg=" crossorigin="anonymous"></script> 
<script type="text/javascript" src="{{asset(ASSET.'frontend/js/jquery-2.2.3.min.js')}}"></script>

<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/bootstrap.min.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/slick.min.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/masterslider.min.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/home.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/manifest.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/contactMap.js')}}"></script> 
<script type="text/javascript" src="{{asset(ASSET.'new_frontend/js/custom.js')}}"></script>
<script src="{!! asset(ASSET.'js/frontend/common.js')!!}"></script>
@yield('bottomscript')
<!--// Required Scripts -->