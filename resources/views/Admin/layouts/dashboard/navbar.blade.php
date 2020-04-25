<?php
$setting = new \App\Helper\CommonHelper;
$languages = $setting->get_langauge_list();
$selected_lang = $setting->get_selected_language();
?>

<header class="main-header">
    <!-- Logo -->
    <?php if (Auth::user()->role_id == ADMIN_ROLE) { ?>
        <a href="{{url(ADMIN.'/dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Logo</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <!--<b>Logo</b>-->
                <img src="{{asset(ASSET.'new_frontend/img/logo-white.png')}}" class="img-circle" alt="User Image" height="50px;">
            </span>
        </a>
    <?php } ?>
    <?php if (Auth::user()->role_id == CONTRIBUTOR_ROLE) { ?>
        <a href="{{url(ADMIN.'/reports/list')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Logo</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <!--<b>Logo</b>-->
                <img src="{{asset(ASSET.'new_frontend/img/logo-white.png')}}" class="img-circle" alt="User Image" height="50px;">
            </span>
        </a>
    <?php } ?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!--        <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="javacript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            
                                <select class="form-control" name="language" id="language">
                                    @foreach($languages as $language)
                                    <option <?php
        if ($selected_lang != '') {
            if ($selected_lang == $language->id) {
                echo 'selected';
            }
        }
        ?> value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </a>
                        </li>
                         User Account: style can be found in dropdown.less 
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                 User image 
                                <li class="user-header">
                                  <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        
                                    <p>
                                        {{ Auth::user()->name }}
                                    </p>
                                </li>
        
                                 Menu Footer
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url(ADMIN_LOGOUT)}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                         Control Sidebar Toggle Button 
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>-->
    </nav>
</header>