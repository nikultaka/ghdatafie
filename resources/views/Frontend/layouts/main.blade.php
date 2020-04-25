
<!DOCTYPE html>
<html lang="zxx">
<?php 

?>
    <head>
        <title>@yield('pageTitle')</title>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script type="application/x-javascript">
            addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
            window.scrollTo(0, 1);
            }
        </script>
        <!-- // Meta Tags -->
        <link href="{{asset(ASSET.'frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset(ASSET.'frontend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="{{asset(ASSET.'frontend/css/flexslider.css')}}" type="text/css" media="screen" property="" />
        <!--testimonial flexslider-->
        <link href="{{asset(ASSET.'frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
        <!--//fonts-->
        @yield('headLink')
        
        <script type="text/javascript">
            var frontend = {};
            var BASE_URL = "{{ url('/') }}";
            
        </script>
    </head>

    <body>
        <!--Header-->
        <div class="header">
            <input type="hidden" value="{{ csrf_token() }}" name='csrf-token' id='csrf-token'>
            @include('Frontend.layouts.header')

            @include('Frontend.layouts.slider')

        </div>
        <!--//Header-->
        <!-- services -->
        @if (\Request::is('register') || \Request::is('login') || \Request::is('profile'))
             @yield('content')
        @else     
            @if (\Request::is('home'))
                <div class="w3-agile-services mkhome">
            @else
                <div class="w3-agile-services">
            @endif
                <div class="container">
                    @yield('content')		
                </div>
            </div>
            @endif
            @include('Frontend.layouts.footer')
            <!-- //services -->
    </body>

</html>