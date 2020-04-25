<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use App\Helper\CommonHelper;

class InfographicsController extends Controller {

        
    public function __construct() {
//        $this->middleware('admin');
    }

    public function index(Request $request,$id = '') {
        
        
        CommonHelper::add_breadcrumb("Infographics", '');
        $infographic = DB::table('infographics')
                    ->select('*')
                    ->where('status',1);
                    if($id != ""){
                        $infographic->where('category_id',$id);
                    }
        $infographics = $infographic->paginate(6);
        
        $infographics_category = DB::table('sub_category')
                ->select('*')
                ->where('status',1)
                ->where('category_id',INFOGRAPHICS)
                ->get();
        
        $query = DB::table('infographics as i')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'i.category_id')
                ->leftJoin('users as u', 'u.id', '=', 'i.user_id')
                ->select('i.*','u.name as username','sc.name as category_name','sc.id as cat_id')
                ->where('i.status',1);
                if($id != ""){
                    $query->where('i.category_id',$id);
                }
                $query->orderBy('i.id', 'desc')
                ->limit(10);
//                ->where('created_at','>=',date('Y-m-d', strtotime('-7 days')))
        $lastWeekInfographic = $query->get();


        
        $default_cat = DB::table('infographics as i')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'i.category_id')
                ->select('i.*','sc.name')
                ->where('i.status',1)
                ->where('i.category_id',DEFAULT_INFOGRAPHICS)
                ->limit(10)
                ->get();
        
        $default_cat_arr = array();
        foreach ($default_cat as $key => $value) {

            $default_cat_arr['categoty_name'] = $value->name;
            $default_cat_arr['total'][] = $value;
        }

        $data['infographics'] = $infographics;
        $data['infographics_category'] = $infographics_category;
        $data['lastWeekInfographic'] = $lastWeekInfographic;
        $data['default_cat'] = $default_cat_arr;
        
        if($request->ajax()) {
            return view('Frontend.infographics.load')->with($data);  
        }
        
        return view('Frontend.infographics.index')->with($data);
    }
        
    public function infographics_info($id) {
        
        $infographics = DB::table('infographics as i')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'i.category_id')
                ->leftJoin('users as u', 'u.id', '=', 'i.user_id')
                ->select('i.*','sc.name','u.name as username','u.email','u.profile_pic')
                ->where('i.id',$id)
                ->first();

        
        $data['infographics'] = $infographics;
        $data['title'] = isset($infographics->title) ? $infographics->title : 'Detail';
        
        CommonHelper::add_breadcrumb("Infographics", url('infographics'));
        CommonHelper::add_breadcrumb(isset($infographics->title) ? $infographics->title : 'Detail', '');
        return view('Frontend.infographics.infographics_info')->with($data);
    }


}
