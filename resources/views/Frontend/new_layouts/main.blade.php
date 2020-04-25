<!DOCTYPE html>
<html lang="en">
<head>
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
@yield('headLink')
<script type="text/javascript">
    var frontend = {};
    var BASE_URL = "{{ url('/') }}";
</script>
<style>
    .has-error{
        border: 1px solid red;
    }
    .container{
        min-width: 95% !important;
    }
</style>
<title>@yield('pageTitle')</title>
</head>
    

        
        
    <body>
        <!--Header-->
        
            <input type="hidden" value="{{ csrf_token() }}" name='csrf-token' id='csrf-token'>
            @include('Frontend.new_layouts.header')
            @include('Frontend.new_layouts.slider')

        <!--//Header-->
        <!-- services -->
            @yield('content')		
            @include('Frontend.new_layouts.footer')
            <!-- //services -->
    </body>

</html>