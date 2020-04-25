<?php
$method = request()->route()->getActionMethod();
$routeArray = app('request')->route()->getAction();
$controllerAction = class_basename($routeArray['controller']);
list($controller, $action) = explode('@', $controllerAction);
//echo '<pre>';
//print_r($controller);
//die;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(ASSET.'dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>

            </div>
        </div>
        <!-- search form -->
        <!--      <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            if (Auth::user()->role_id == ADMIN_ROLE) {
                ?>
                <li class="header">MAIN NAVIGATION</li>

                <li><a href="{{url(ADMIN_DASHBOARD)}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{url(ADMIN.'/user')}}"><i class="fa fa-user"></i> <span>User</span></a></li>
                <li class="treeview <?php
                if (isset($controller) && $controller == 'CmsController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>CMS</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'CmsController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/cms')}}"><i class="fa fa-circle-o"></i> Add CMS</a></li>
                        <li><a href="{{url(ADMIN.'/cms/list')}}"><i class="fa fa-circle-o"></i>CMS List</a></li>
                    </ul>
                </li>
                <li class="treeview <?php
                if (isset($controller) && $controller == 'BrandController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>Brand</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'BrandController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/brand')}}"><i class="fa fa-circle-o"></i>Add Brand</a></li>
                        <li><a href="{{url(ADMIN.'/brand/list')}}"><i class="fa fa-circle-o"></i>Brand List</a></li>
                    </ul>
                </li>
                <li class="treeview <?php
                if (isset($controller) && $controller == 'DatasetController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>Dataset</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'DatasetController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/dataset')}}"><i class="fa fa-circle-o"></i>Add Dataset</a></li>
                        <li><a href="{{url(ADMIN.'/dataset/list')}}"><i class="fa fa-circle-o"></i>Dataset List</a></li>
                    </ul>
                </li>
                <li class="treeview <?php
                if (isset($controller) && ($controller == 'CategoryController' || $controller == 'SubcategoryController')) {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && ($controller == 'CategoryController' || $controller == 'SubcategoryController')) {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/category')}}"><i class="fa fa-circle-o"></i>Category</a></li>
                        <li><a href="{{url(ADMIN.'/subcategory')}}"><i class="fa fa-circle-o"></i>Sub Category</a></li>
                    </ul>
                </li>
                <li class="treeview <?php
                if (isset($controller) && $controller == 'NewsController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        <span>News</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'NewsController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/news')}}"><i class="fa fa-circle-o"></i>Add News</a></li>
                        <li><a href="{{url(ADMIN.'/news/list')}}"><i class="fa fa-circle-o"></i>News List</a></li>
                    </ul>
                </li>
                <li class="treeview <?php
                if (isset($controller) && $controller == 'InfographicsController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Infographics</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'InfographicsController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/infographics')}}"><i class="fa fa-circle-o"></i>Add Infographics</a></li>
                        <li><a href="{{url(ADMIN.'/infographics/list')}}"><i class="fa fa-circle-o"></i>Infographics List</a></li>
                    </ul>
                </li>

            <?php } ?>
            <li class="treeview <?php
            if (isset($controller) && $controller == 'ReportsController') {
                echo 'menu-open';
            }
            ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="<?php
                if (isset($controller) && $controller == 'ReportsController') {
                    echo 'display:block';
                }
                ?>">
                    <li><a href="{{url(ADMIN.'/reports')}}"><i class="fa fa-circle-o"></i>Add Reports</a></li>
                    <li><a href="{{url(ADMIN.'/reports/list')}}"><i class="fa fa-circle-o"></i>Reports List</a></li>
                </ul>
            </li>
            <li><a href="{{url(ADMIN.'/order')}}"><i class="fa fa-user"></i> <span>Orders</span></a></li>

            <?php if (Auth::user()->role_id == ADMIN_ROLE) { ?>


                <li class="treeview <?php
                if (isset($controller) && $controller == 'BlogController') {
                    echo 'menu-open';
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Blog</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="<?php
                    if (isset($controller) && $controller == 'BlogController') {
                        echo 'display:block';
                    }
                    ?>">
                        <li><a href="{{url(ADMIN.'/blog')}}"><i class="fa fa-circle-o"></i>Add Blog</a></li>
                        <li><a href="{{url(ADMIN.'/blog/list')}}"><i class="fa fa-circle-o"></i>Blog List</a></li>
                    </ul>
                </li>
        <!--        <li><a href="{{url(ADMIN.'/language')}}"><i class="fa fa-user"></i> <span>Language</span></a></li>-->
                <li><a href="{{url(ADMIN.'/contact')}}"><i class="fa fa-user"></i> <span>Membership Request</span></a></li>




                <li><a href="{{url(ADMIN.'/banner')}}"><i class="fa fa-flag"></i> <span>Banner</span></a></li>
                <li><a href="{{url(ADMIN.'/advancesettings')}}"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>
                <li><a href="{{url(ADMIN.'/setting')}}"><i class="fa fa-wrench"></i> <span>Contact Details</span></a></li>
                <li><a href="{{url(ADMIN.'/testimonial')}}"><i class="fa fa-quote-left"></i> <span>Testimonial</span></a></li>

            <?php } ?>
            <!--        <li class="treeview">
                      <a href="#">
                        <i class="fa fa-question-circle"></i>
                        <span>Faq</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{url('admin/faq')}}"><i class="fa fa-circle-o"></i>Faq </a></li>
                        <li><a href="{{url('admin/faq_category')}}"><i class="fa fa-circle-o"></i>Faq Category </a></li>
                      </ul>
                    </li>-->



<!--<li><a href="{{url('admin/contact_us')}}"><i class="fa fa-phone"></i> <span>Contact us</span></a></li>-->

<!--<li><a href="{{url('admin/newsletter')}}"><i class="fa fa-newspaper-o"></i> <span>Newsletter</span></a></li>-->

            <!--        <li class="treeview">
                      <a href="#">
                        <i class="fa fa-wrench"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{url('admin/setting')}}"><i class="fa fa-circle-o"></i>General Settings</a></li>
                        <li><a href="{{url(ADMIN.'/advancesettings')}}"><i class="fa fa-circle-o"></i>Advance Custom Fields</a></li>
                      </ul>
                    </li>-->

            <!--        <li class="treeview">
                      <a href="#">
                        <i class="fa fa-medium"></i>
                        <span>Media</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{url('admin/media')}}"><i class="fa fa-circle-o"></i>Media Category</a></li>
                        <li><a href="{{url('admin/upload-media')}}"><i class="fa fa-circle-o"></i>Media Upload</a></li>
                      </ul>
                    </li>-->

<!--<li><a href="{{url('admin/bullet')}}"><i class="fa fa-list-alt"></i> <span>Bullet</span></a></li>-->

<!--<li><a href="{{url('admin/product')}}"><i class="fa fa-product-hunt"></i> <span>Product</span></a></li>-->

            <li><a href="{{ url(ADMIN.'/logout')}}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>