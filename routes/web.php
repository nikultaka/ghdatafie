<?php



/*

  |--------------------------------------------------------------------------

  | Web Routes

  |--------------------------------------------------------------------------

  |

  | Here is where you can register web routes for your application. These

  | routes are loaded by the RouteServiceProvider within a group which

  | contains the "web" middleware group. Now create something great!

  |

 */

//FrontEnd Start

Route::get('/', 'Frontend\HomeController@index');

Route::get('/home', 'Frontend\HomeController@index');

//Route::get('/dataset', 'Frontend\DatasetController@index');

Route::get('/dataset/', 'Frontend\DatasetController@datasetdetails');

Route::get('/dataset/{id}', 'Frontend\DatasetController@datasetdetails');

Route::get('/datasets', 'Frontend\DatasetController@datasetlist');

Route::get('/datasets/{id}', 'Frontend\DatasetController@datasetlist');

Route::post('/dataset/search_brand', 'Frontend\DatasetController@search_brand');

Route::get('/test', 'Frontend\CmsController@test');

//Data page Start

Route::get('/data', 'Frontend\HomeController@data');

//Data page End

// User Routes Start

Route::get('/forgot_password', 'Frontend\UserController@forgot_password_view');


Route::post('/send_mail', 'Frontend\UserController@forgot_password');

Route::get('/resetpassword/{id}', 'Frontend\UserController@reset_password');

Route::post('/resetpass', 'Frontend\UserController@update_new_password');



Route::post('/check_email', 'Frontend\UserController@check_email');

Route::get('/login', 'Frontend\UserController@login');

Route::post('/login', 'Frontend\UserController@user');

Route::get('/register', 'Frontend\UserController@register');

Route::post('register/add', 'Frontend\UserController@add_user');

Route::get('profile', 'Frontend\UserController@profile');

// User Routes End

// 

//FrontEnd End



Route::get('news', 'Frontend\NewsController@index');

Route::get('news/{id}', 'Frontend\NewsController@news_info');

Route::get('news/category/{id}', 'Frontend\NewsController@index');





Route::get('infographics', 'Frontend\InfographicsController@index');

Route::get('infographics/{id}', 'Frontend\InfographicsController@infographics_info');

Route::get('infographics/category/{id}', 'Frontend\InfographicsController@index');





Route::get('reports', 'Frontend\ReportsController@index');

Route::get('user/report', 'Frontend\UserReportsController@index');

Route::get('user/report/add', 'Frontend\UserReportsController@add_report');

Route::post('user/reports/add', 'Frontend\UserReportsController@add');

Route::any('user/report/edit/{id}', 'Frontend\UserReportsController@edit');

Route::any('user/report/delete', 'Frontend\UserReportsController@delete');

Route::any('user/report/sort', 'Frontend\UserReportsController@sort_report_data');

Route::any('user/report/subsort', 'Frontend\UserReportsController@sort_subreport_data');

Route::any('user/report/reportdata_list', 'Frontend\UserReportsController@report_data_refresh');

Route::any('user/report/edit_subreportdata', 'Frontend\UserReportsController@edit_subreport_data');

Route::any('user/report/delete_reportdata', 'Frontend\UserReportsController@delete_report_data');

Route::any('user/report/delete_subreportdata', 'Frontend\UserReportsController@delete_subreport_data');

Route::any('user/report/subreportdata', 'Frontend\UserReportsController@add_subreport_data');

Route::any('user/report/reportdata', 'Frontend\UserReportsController@add_report_data');

Route::any('user/report/edit_reportdata', 'Frontend\UserReportsController@edit_report_data');

Route::any('user/report/report_data/{id}', 'Frontend\UserReportsController@report_data');

Route::any('user/reports/getdata', 'Frontend\UserReportsController@reports_data_table');




Route::get('user/order_list', 'Frontend\OrderController@index');

Route::any('user/orders/getdata', 'Frontend\OrderController@orders_data_table');

Route::any('user/booking', 'Frontend\OrderController@booking_view');

Route::any('user/booking/getdata', 'Frontend\OrderController@booking_data_table');



Route::get('pricing', 'Frontend\PricingController@index');

Route::get('order/{id}', 'Frontend\PricingController@order');

Route::post('order/add', 'Frontend\PricingController@orderadd');



Route::get('reports/{id}', 'Frontend\ReportsController@more_details');

Route::get('reports/book/{id}', 'Frontend\ReportsController@book_details');

Route::get('reports/download/{id}', 'Frontend\ReportsController@report_download');



Route::get('/overview-studies-reports', 'Frontend\ReportsController@coming_soon');


Route::any('reports/previewbookicon', 'Frontend\UserReportsController@generateReportImage');


Route::get('/download/report/{id}', 'Frontend\ReportsController@download_report');

Route::post('dopay', 'Frontend\PaymentController@handleonlinepay');


Route::get('/logout', function() {

    Auth::logout();

    return Redirect::to('/');

});



// BackEnd Start

Route::group(['prefix' => ADMIN], function() {

    Route::get('/', function() {

        return view('Admin.login');

    });



    Route::get('/login', function() {



        return view('Admin.login');

    });

    Route::post('/login', 'Admin\AdminController@login');

    Route::get('/dashboard', 'Admin\DashboardController@index');



//     User Routes Start

    Route::post('/email_check', 'Admin\UserController@email_check');

    Route::get('/user', 'Admin\UserController@index');

    Route::post('/user/add', 'Admin\UserController@add');

    Route::post('/user/edit', 'Admin\UserController@edit');

    Route::post('/user/update', 'Admin\UserController@update');

    Route::post('/user/delete', 'Admin\UserController@delete');

    Route::post('/user/gettable', 'Admin\UserController@user_data_table');

//     User Routes End

//     CMS Routes Start

    Route::get('cms', 'Admin\CmsController@index');

    Route::get('cms/index', 'Admin\CmsController@index');

    Route::any('cms/add', 'Admin\CmsController@add');

    Route::any('cms/list', 'Admin\CmsController@cms_list');

    Route::any('cms/getdata', 'Admin\CmsController@cms_data_table');

    Route::any('cms/delete', 'Admin\CmsController@delete');

    Route::any('cms/edit/{id}', 'Admin\CmsController@edit');

    Route::any('cms/slug', 'Admin\CmsController@check_slug');

//     CMS Routes End

//     Brand Routes Start

    Route::get('brand', 'Admin\BrandController@index');

    Route::get('brand/index', 'Admin\BrandController@index');

    Route::any('brand/add', 'Admin\BrandController@add');

    Route::any('brand/list', 'Admin\BrandController@brand_list');

    Route::any('brand/getdata', 'Admin\BrandController@brand_data_table');

    Route::any('brand/delete', 'Admin\BrandController@delete');

    Route::any('brand/edit/{id}', 'Admin\BrandController@edit');

    Route::any('brand/slug', 'Admin\BrandController@check_slug');

//     Brand Routes End

//     news Routes Start

    Route::get('news', 'Admin\NewsController@index');

    Route::get('news/index', 'Admin\NewsController@index');

    Route::any('news/add', 'Admin\NewsController@add');

    Route::any('news/list', 'Admin\NewsController@news_list');

    Route::any('news/getdata', 'Admin\NewsController@news_data_table');

    Route::any('news/delete', 'Admin\NewsController@delete');

    Route::any('news/edit/{id}', 'Admin\NewsController@edit');

    Route::any('news/slug', 'Admin\NewsController@check_slug');

//     news Routes End

//     category Routes Start

    Route::get('/category', 'Admin\CategoryController@index');

    Route::post('/category/add', 'Admin\CategoryController@add');

    Route::post('/category/edit', 'Admin\CategoryController@edit');

    Route::post('/category/update', 'Admin\CategoryController@update');

    Route::post('/category/delete', 'Admin\CategoryController@delete');

    Route::post('/category/gettable', 'Admin\CategoryController@category_data_table');

//     category Routes End

//     

//     sub category Routes Start

    Route::get('/subcategory', 'Admin\SubcategoryController@index');

    Route::post('/subcategory/add', 'Admin\SubcategoryController@add');

    Route::post('/subcategory/edit', 'Admin\SubcategoryController@edit');

    Route::post('/subcategory/update', 'Admin\SubcategoryController@update');

    Route::post('/subcategory/delete', 'Admin\SubcategoryController@delete');

    Route::post('/subcategory/gettable', 'Admin\SubcategoryController@subcategory_data_table');

//     sub category Routes End

//     CMS Routes Start

    Route::get('reports', 'Admin\ReportsController@index');

    Route::get('reports/index', 'Admin\ReportsController@index');

    Route::any('reports/add', 'Admin\ReportsController@add');

    Route::any('reports/list', 'Admin\ReportsController@reports_list');

    Route::any('reports/getdata', 'Admin\ReportsController@reports_data_table');

    Route::any('reports/delete', 'Admin\ReportsController@delete');

    Route::any('reports/edit/{id}', 'Admin\ReportsController@edit');

    Route::any('reports/status_apporovied', 'Admin\ReportsController@status_apporovied');
    
    Route::any('reports/status_rejected', 'Admin\ReportsController@status_rejected');



    Route::any('reports/report_data/{id}', 'Admin\ReportsController@report_data');

    Route::any('reports/reportdata', 'Admin\ReportsController@add_report_data');

    Route::any('reports/sort', 'Admin\ReportsController@sort_report_data');

    Route::any('reports/edit_reportdata', 'Admin\ReportsController@edit_report_data');

    Route::any('reports/delete_reportdata', 'Admin\ReportsController@delete_report_data');

    Route::any('reports/reportdata_list', 'Admin\ReportsController@report_data_refresh');

    Route::any('reports/subsort', 'Admin\ReportsController@sort_subreport_data');

    Route::any('reports/subreportdata', 'Admin\ReportsController@add_subreport_data');

    Route::any('reports/edit_subreportdata', 'Admin\ReportsController@edit_subreport_data');

    Route::any('reports/delete_subreportdata', 'Admin\ReportsController@delete_subreport_data');
    

    Route::any('reports/previewbookicon', 'Admin\ReportsController@generateReportImage');



    // Testimonial start

    // 

    Route::get('testimonial', 'Admin\TestimonialController@index');

    Route::any('testimonial/addrecord', 'Admin\TestimonialController@addrecord');

    Route::any('testimonial/getdata', 'Admin\TestimonialController@anydata')->name('testimonial/getdata');

    Route::any('testimonial/delete', 'Admin\TestimonialController@deleterecord');

    Route::any('testimonial/edit', 'Admin\TestimonialController@edittestimonial');

    // Testimonial End

//    Route::any('reports/slug', 'Admin\ReportsController@check_slug');

//     CMS Routes End    

//     Infographics Routes Start

    Route::get('infographics', 'Admin\InfographicsController@index');

    Route::get('infographics/index', 'Admin\InfographicsController@index');

    Route::any('infographics/add', 'Admin\InfographicsController@add');

    Route::any('infographics/list', 'Admin\InfographicsController@news_list');

    Route::any('infographics/getdata', 'Admin\InfographicsController@infographics_data_table');

    Route::any('infographics/delete', 'Admin\InfographicsController@delete');

    Route::any('infographics/edit/{id}', 'Admin\InfographicsController@edit');

//     Infographics Routes End

//     

//     Dataset Routes Start

    Route::get('dataset', 'Admin\DatasetController@index');

    Route::get('dataset/index', 'Admin\DatasetController@index');

    Route::any('dataset/add', 'Admin\DatasetController@add');

    Route::any('dataset/list', 'Admin\DatasetController@reports_list');

    Route::any('dataset/getdata', 'Admin\DatasetController@dataset_data_table');

    Route::any('dataset/delete', 'Admin\DatasetController@delete');

    Route::any('dataset/edit/{id}', 'Admin\DatasetController@edit');

//    Route::any('reports/slug', 'Admin\ReportsController@check_slug');



    Route::get('setting', 'Admin\SitesettingController@index');

    Route::post('sitesetting/save_details', 'Admin\SitesettingController@save_details');

    Route::any('sitesetting/uploadlogo', 'Admin\SitesettingController@uploadlogo');

//    

    // Advance Custom Filds Section Routes Start

    Route::get('advancesettings', 'Admin\AdvancesettingController@index');

    Route::post('advancesettings/store', 'Admin\AdvancesettingController@store');

    Route::any('advancesettings/getdata', 'Admin\AdvancesettingController@getdatatable')->name('advancesettings/getdata');

    Route::post('advancesettings/delete', 'Admin\AdvancesettingController@destroy');

    Route::post('advancesettings/edit', 'Admin\AdvancesettingController@edit');



    // Advance Custom Filds Section Routes End

    // Banner Section Routes Start

    Route::get('/banner', 'Admin\BannerController@index');

    Route::post('/banner/add', 'Admin\BannerController@add');

    Route::post('/banner/edit', 'Admin\BannerController@edit');

    Route::post('/banner/update', 'Admin\BannerController@update');

    Route::post('/banner/delete', 'Admin\BannerController@delete');

    Route::post('/banner/getdata', 'Admin\BannerController@data_table');



    // Banner Section Routes End

    // language section Start

    Route::get('/language', 'Admin\LanguageController@index');

    Route::post('/language/add', 'Admin\LanguageController@add');

    Route::post('/language/edit', 'Admin\LanguageController@edit');

    Route::post('/language/update', 'Admin\LanguageController@update');

    Route::post('/language/delete', 'Admin\LanguageController@delete');

    Route::post('/language/getdata', 'Admin\LanguageController@data_table');

    Route::post('/language/change', 'Admin\LanguageController@change');



    // language section End

    // blog section Start

    Route::get('blog', 'Admin\BlogController@index');

    Route::get('blog/index', 'Admin\BlogController@index');

    Route::any('blog/add', 'Admin\BlogController@add');

    Route::any('blog/list', 'Admin\BlogController@brand_list');

    Route::any('blog/getdata', 'Admin\BlogController@data_table');

    Route::any('blog/delete', 'Admin\BlogController@delete');

    Route::any('blog/edit/{id}', 'Admin\BlogController@edit');

    Route::any('blog/slug', 'Admin\BlogController@check_slug');

    // blog section End

    // contact us section start

    Route::get('contact', 'Admin\ContactController@index');

    Route::any('contact/getdata', 'Admin\ContactController@anydata')->name('contact/getdata');

    Route::any('contact/delete', 'Admin\ContactController@deleterecord');

    Route::any('contact/edit', 'Admin\ContactController@editcontact_us');

    Route::any('contact/email', 'Admin\ContactController@email_reply');

    Route::any('contact/email_send', 'Admin\ContactController@email');



    // contact us section end

//     CMS Routes End    

    

    Route::get('order', 'Admin\OrderController@order_list');

    Route::post('order/gettable', 'Admin\OrderController@orders_data_table');



    Route::get('/logout', function() {



        Auth::logout();

        return Redirect::to(ADMIN);

    });

});

// BackEnd End

//we have to put this at bottom

Route::get('{slug}', [

    'uses' => 'Frontend\CmsController@index'

])->where('slug', '([A-Za-z0-9\-\/]+)');

//we have to put this at bottom