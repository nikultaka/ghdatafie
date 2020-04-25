<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\CommonHelper;
class HomeController extends Controller {

    public function index(Request $request) {
        $data =  CommonHelper::get_contact_details();
        $cmsDetails = DB::table('cms')
                ->select('*')
                ->where('slug_url','=', 'markets-section-home')
                ->first();
        $data['cmsDetails'] = $cmsDetails;
        $brands = DB::table('brand')
                    ->select('*')
                    ->where('status', 1)
                    ->where('is_consultancy', '!=', 1)
                    ->take(15)->get();
        
        //popular brands
        $brands_all = DB::table('brand')
                    ->select('*')
                    ->where('status', 1)
                    ->orderBy('popular_count','DESC')
                    ->where('is_consultancy', '!=', 1)
                    ->take(20)
                    ->get();
        
        //popular dataset
        $dataset = DB::table('tbl_dataset')
                    ->select('*')
                    ->where('fld_dataset_status', 1)
                    ->orderBy('popular_count','DESC')
                    ->take(10)
                    ->get();
        
        $news = DB::table('news')
                ->select('*')
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();

        $packeges_details = DB::table('packages')
                        ->select('*')
                        ->where('status', '!=', -1)
                        ->get()->toarray();
        
        $infographics = DB::table('infographics')
                        ->select('*')
                        ->where('status',1)
                        ->orderBy('id', 'desc')
                        ->take(10)
//                        ->whereRaw('Date(created_at) = CURDATE()')
                        ->get();
        
        $data['news_details'] = $news;
        $data['packeges'] = $packeges_details;
        $data['brands'] = $brands;
        $data['brands_all'] = $brands_all;
        $data['infographics'] = $infographics;
        $data['dataset'] = $dataset;
        return view('Frontend.home.index')->with($data);
    }

    public function data(Request $request) {
        CommonHelper::add_breadcrumb("Data", '');
        $brands = DB::table('brand')
                ->select('*')
                ->where('status', 1)
                ->where('is_consultancy', '!=', 1)
                ->paginate(16);
        
        $count_brands = DB::table('brand')
                ->select('*')
                ->where('status', 1)
                ->where('is_consultancy', '!=', 1)
                ->count();
  

        $dataset = DB::table('tbl_dataset')
                ->select('*')
                ->where('fld_dataset_status', 1)
                ->orderBy('fld_dataset_id', 'DESC')
                ->limit(10)
                ->get();

        $data['brands'] = $brands;
        $data['datasets'] = $dataset;
        $data['count_brands'] = $count_brands;

        if ($request->ajax()) {
            return view('Frontend.home.load')->with($data);
        }
        return view('Frontend.home.data')->with($data);
    }

}
