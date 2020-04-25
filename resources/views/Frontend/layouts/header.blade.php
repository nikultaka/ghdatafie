<?php
$setting = new \App\Helper\CommonHelper;
?>
<div class="top">
    <div class="container">  
        <div class="col-md-4 top-left">  
            <ul>      
                <li>{!! $setting->get_setting_details('phone','label') !!} {{$setting->get_setting_details('phone','fild_value')}}</li>
                <li>{!! $setting->get_setting_details('email','label') !!} 
                    <a href="mailto:{{$setting->get_setting_details('email','fild_value')}}">
                        {{$setting->get_setting_details('email','fild_value')}}
                    </a>
                </li>     
            </ul>    
        </div> 
        <div class="col-md-8 top-middle login_social">                  
            @if(Auth::check())   
            <div class="col-md-5 login_margin" style="color:#FFFFFF">    
                <a href="{{url('profile')}}" class="login_regis">Welcome {{Auth::user()->name}} </a> |      
                <a href="main_forum.php" class="login_regis">Topics</a> |      
                <a href="{{url('logout')}}" class="login_regis">Logout</a>
            </div>  
            @else   
            <div class="col-md-5 login_margin">
                <a href="{{url('login')}}" class="login_regis">Login/</a>
                <a href="{{url('register')}}" class="login_regis">Register</a>
            </div>   
            @endif   
            <div class="col-md-7 social_iconss">     
                <ul>       
                    <li>
                        <a href="{{$setting->get_setting_details('facebook','fild_value')}}">
                            {!! $setting->get_setting_details('facebook','label') !!}
                        </a>
                    </li>  
                    <li>
                        <a href="{{$setting->get_setting_details('twitter','fild_value')}}">
                            {!! $setting->get_setting_details('twitter','label') !!}
                        </a>
                    </li>  
                    <li>
                        <a href="{{$setting->get_setting_details('google-plus','fild_value')}}">
                            {!! $setting->get_setting_details('google-plus','label') !!}
                        </a>
                    </li>    
                    <li><a href="{{$setting->get_setting_details('linkedin','fild_value')}}">
                            {!! $setting->get_setting_details('linkedin','label') !!}
                        </a>
                    </li>   
                </ul>     
            </div>  
        </div>   
        <div class="clearfix"></div> 
    </div>

</div>
<!--top-bar-w3layouts-->
<div class="top-bar-w3layouts">  
    <div class="container">   
        <nav class="navbar navbar-default">   
            <div class="navbar-header">   
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>      
                <h1>
                    <a href="{{url('home')}}">
                        <img src="{{url(ASSET.'frontend/images/logo.png')}}">
                    </a>
                </h1>    
            </div>   
            <!-- navbar-header -->   
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">   
                <ul class="nav navbar-nav navbar-right">  
                    <li><a href="{{url('home')}}">Home</a></li>   
                    <li><a href="{{url('data')}}" >Data</a></li>  
                    <li><a href="{{url('services')}}"  >Services</a></li>  
                    <!--<li><a href="interact.php" >Interact</a></li>-->     
                    <li><a href="{{url('infographics')}}">Infographics</a></li>  
                    <li><a href="{{url('reports')}}">Reports</a></li>       
                    <li><a href="{{url('pricing')}}">Pricing</a></li>     
                    <!--<li><a href="#">Prices & Access</a></li>-->       
                    <li><a href="{{url('news')}}" >News</a></li>     
                </ul>     
            </div>   
            <div class="star_search">    
                <div class="star">
                    <img src="{{url(ASSET.'frontend/images/star.png')}}">
                </div>      
            </div>      
            <div class="clearfix"> 
            </div>   
        </nav> 
    </div>
</div>