<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('facebookShare')
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image" sizes="32x32" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i'  media='all' />
        <link rel="stylesheet" type="text/css" href="https://bootstrapmade.com/demo/assets/css/fontello.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/masterslider.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/slick.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/slick-theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/custom-style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/responsive.css')}}" />
        <!--<link href="{{asset(ASSET.'frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />-->
        @yield('headLink')
        <script type="text/javascript">
            var frontend = {};
            var BASE_URL = "{{ url('/') }}";
        </script>
        <style>
            /*    .has-error{
                    border: 1px solid red;
                }*/
        </style>
        <title>@yield('pageTitle')</title>
    </head>


    <style>
        #loader {
            position: fixed;
            opacity: 0.5;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('//upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Phi_fenomeni.gif/50px-Phi_fenomeni.gif') 50% 50% no-repeat rgb(249, 249, 249);
            display: none;
        }
        .container{
            min-width: 95% !important;
        }

    </style>


    <body class="inner-pages">
        <!--Header-->

        <input type="hidden" value="{{ csrf_token() }}" name='csrf-token' id='csrf-token'>
        <div id="loader">
            <!--<img src="{{asset(ASSET.'upload/Spinner.gif')}}" class="ajax-loader">-->
        </div>

        @include('Frontend.new_layouts.inner_header')

        <!--//Header-->
        <!-- services -->
<!--        <section class="content infographic-page">
            <div class="container" style="padding: 0px;">
                
            </div>
        </section>-->
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
            @endforeach
        </div>

        @yield('content')		
        @include('Frontend.new_layouts.inner_footer')
        <!-- //services -->
    </body>

</html>