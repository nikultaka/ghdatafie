<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use App\Helper\CommonHelper;

class NewsController extends Controller {

        
    public function __construct() {
//        $this->middleware('admin');
    }

    public function index(Request $request, $id = '') {

        $news_query = DB::table('news')
                ->select('*')
                ->where('status',1);
                if($id != ""){
                    $news_query->where('category_id',$id);
                }
        $news = $news_query->paginate(6);
        
        $news_category = DB::table('sub_category')
                ->select('*')
                ->where('status',1)
                ->where('category_id',NEWS)
                ->get();
        
        $query = DB::table('news as n')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'n.category_id')
                ->leftJoin('users as u', 'u.id', '=', 'n.user_id')
                ->select('n.*','u.name as username','sc.name as category_name','sc.id as cat_id')
                ->where('n.status',1);
                if($id != ""){
                    $query->where('n.category_id',$id);
                }
                $query->orderBy('n.id', 'desc')
                ->limit(10);
//                ->where('created_at','>=',date('Y-m-d', strtotime('-7 days')))
        $lastWeekNews = $query->get();
        
        $default_cat = DB::table('news as n')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'n.category_id')
                ->select('n.*','sc.name')
                ->where('n.status',1)
                ->where('n.category_id',DEFAULT_NEWS)
                ->limit(10)
                ->get();
        
        $default_cat_arr = array();
        foreach ($default_cat as $key => $value) {

            $default_cat_arr['categoty_name'] = $value->name;
            $default_cat_arr['total'][] = $value;
        }

        $data['news'] = $news;
        $data['news_category'] = $news_category;
        $data['lastWeekNews'] = $lastWeekNews;
        $data['default_cat'] = $default_cat_arr;
        $data['title'] = 'News';
        
        
        CommonHelper::add_breadcrumb("News", '');
        
        if($request->ajax()) {
            return view('Frontend.news.load')->with($data);  
        }
        
        return view('Frontend.news.index')->with($data);
    }
    
    public function news_info($id) {


        $news = DB::table('news as n')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'n.category_id')
                ->leftJoin('users as u', 'u.id', '=', 'n.user_id')
                ->select('n.*','sc.name','u.name as username','u.email','u.profile_pic')
                ->where('n.id',$id)
                ->first();

        $data['news'] = $news;
        $data['title'] = isset($news->title) ? $news->title : '';
        
        CommonHelper::add_breadcrumb("News", url('news'));
        CommonHelper::add_breadcrumb(isset($news->title) ? $news->title : 'Detail', '');
        
        return view('Frontend.news.news_info')->with($data);
    }


}
