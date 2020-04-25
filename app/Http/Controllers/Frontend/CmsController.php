<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\CommonHelper;

class CmsController extends Controller
{
    public function index($slug = null){
        $lang_id = CommonHelper::user_selected_language();
        $cmsDetails = DB::table('cms')
                ->select('*')
                ->where('slug_url','=', $slug)
                ->where('language_id',$lang_id)
                ->get()->toArray();
        $data = array();
        $data['cmsDetails'] = $cmsDetails;
        if($slug == 'services'){
           $testimonial = DB::table('testimonial')
                ->select('*')
                   ->where('status',1)
                ->orderBy('id', 'desc')->take(5)
                ->get();
           $brands = DB::table('brand')
                ->select('*')
                ->where('status', '!=', -1)
                ->where('is_consultancy', '!=', 2)
                ->get();
           
          $data['testimonial'] = $testimonial;
          $data['services'] = $brands;
        }
       
        CommonHelper::add_breadcrumb($slug, '');
        if(!empty($cmsDetails)){
            
            return view('Frontend.cms.index')->with($data);
        }
        else{
            return view('errors.404')->with($data);
        }
    }
    public function test(){
        $slug = 'services';
        $lang_id = CommonHelper::user_selected_language();
        $cmsDetails = DB::table('cms')
                ->select('*')
                ->where('slug_url','=', $slug)
                ->where('language_id',$lang_id)
                ->get();
        $data = array();
        
        $data['cmsDetails'] = $cmsDetails;
        if($slug == 'services'){
           $testimonial = DB::table('testimonial')
                ->select('*')
                   ->where('status',1)
                ->orderBy('id', 'desc')->take(5)
                ->get();
           $brands = DB::table('brand')
                ->select('*')
                ->where('status', '!=', -1)
                ->where('is_consultancy', '!=', 2)
                ->get();
           
          $data['testimonial'] = $testimonial;
          $data['services'] = $brands;
        }
        CommonHelper::add_breadcrumb($slug, '');
        return view('Frontend.test.index')->with($data);
    }
}
