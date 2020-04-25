<div class="top-header">

    <div class="container">

        <div class="d-flex">

            <div class="logo"> <a href="#" class="scrollto"><img src="{{asset(ASSET.'new_frontend/img/logo-white.png')}}" alt="" title="" /></a></div>

            <div class="right-header">

                <a href="{{url('pricing')}}" class="btn btn-success green-btn">Order now</a>

                <div class="StickyHeader-text">And get full access Ghdatafie. <span></span></div>

            </div>

        </div>

    </div>

</div>

<header id="header" class="header">

    <div class="container">

        <div id="logo" class="pull-left">

            <h1><a href="{{ url("home") }}" class="scrollto"><img src="{{asset(ASSET.'new_frontend/img/logo-white.png')}}" alt="" title="" /></a></h1>

        </div>

        <nav class="navbar navbar-expand-lg " id="nav-menu-container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav-menu">

                    <li><a href="{{url('home')}}">Home</a></li>

                    <li><a href="{{url('data')}}" >Data</a></li>

                    <li><a href="{{url('services')}}"  >Services</a></li>

                    <li><a href="{{url('infographics')}}">Infographics</a></li>

                    <li><a href="{{url('reports/1')}}">Reports</a></li>

                    <li><a href="{{url('pricing')}}">Pricing</a></li>

                    <li><a href="{{url('news')}}" >News</a></li>

                    @if(Auth::check() && Auth::user()->role_id == USER_ROLE || Auth::check() && Auth::user()->role_id == CONTRIBUTOR_ROLE)
                    <!--            <a href="{{url('profile')}}" class="login_regis">Welcome {{Auth::user()->name}} </a> | -->

                    <!--            <a href="main_forum.php" class="login_regis">Topics</a> | -->

                    <li>
                        <div class="dropdown">
                            <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>-->
                            <a  class="login_regis dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                <button class="dropdown-item" type="button" onclick="window.location ='{{ url("user/order_list") }}'" style="padding: 0.25rem 1.5rem">My Orders </button>

                                <?php
                                if (Auth::user()->role_id == CONTRIBUTOR_ROLE) {
                                    ?>
                                    <button class="dropdown-item" type="button" onclick="window.location ='{{ url("user/booking") }}'" style="padding: 0.25rem 1.5rem">My Bookings </button>
                                    
                                    <button class="dropdown-item" type="button" onclick="window.location ='{{ url("user/report") }}'" style="padding: 0.25rem 1.5rem">My Reports </button>
                                <?php } ?>

                                <button class="dropdown-item" onclick="window.location ='{{ url("logout") }}'" type="button" style="padding: 0.25rem 1.5rem">Logout</button>

                            </div>

                        </div>

                        <!--                        <a href="{{url('logout')}}" class="login_regis">{{Auth::user()->name}}</a>-->

                    </li>

                    @else

                    <li><a href="{{url('login')}}">Login</a></li>

                    @endif

                </ul>

            </div>

        </nav>

        <!-- #nav-menu-container -->     

    </div>

</header>

