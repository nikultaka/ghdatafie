<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use App\Helper\CommonHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class ReportsController extends Controller {

    public function __construct() {

//        $this->middleware('user');
    }

    public function index(Request $request) {



        $data = array();



        $sub_category = DB::table('sub_category')
                ->select('*')
                ->where('category_id', REPORTS)
                ->where('status', 1)
                ->get();



        $sub_category_reports = array();

        if (!empty($sub_category)) {

            foreach ($sub_category as $key => $value) {





                $reports = DB::table('reports as r')
                                ->leftJoin('sub_category as sc', 'sc.id', '=', 'r.sub_category_id')
                                ->select('r.*')
                                ->where('r.status', 1)
                                ->where('r.sub_category_id', $value->id)
                                ->limit(3)
                                ->get()->toArray();



                $reports_data['details'] = $reports;



                $sum = 0;

                foreach ($reports as $k => $v) {

                    if (is_int($k) && $k < 3) {

                        $sum += $v->price;
                    }
                }



                $reports_data['id'] = $value->id;

                $reports_data['price'] = $sum;

                $reports_data['description'] = $value->description;

                $reports_data['name'] = $value->name;



                $sub_category_reports[] = $reports_data;
            }
        }



        $data['sub_category'] = $sub_category;

        $data['reports'] = $sub_category_reports;

        $data['title'] = 'Reports';

        CommonHelper::add_breadcrumb("Reports", '');

        return view('Frontend.reports.index')->with($data);
    }

    public function more_details($id) {



        $data = array();



        if (isset($id) && $id != "") {



            $reports_name = DB::table('sub_category')
                    ->select('*')
                    ->where('status', 1)
                    ->where('id', $id)
                    ->first();



            $reports = DB::table('reports as r')
                    ->leftJoin('sub_category as sc', 'sc.id', '=', 'r.sub_category_id')
                    ->select('r.*', 'sc.name')
                    ->where('r.status', 1)
                    ->where('r.sub_category_id', $id)
                    ->orderBy('r.popular_count', 'DESC')
                    ->limit(6)
                    ->get();

            $sum = 0;

            foreach ($reports as $k => $v) {

                if (is_int($k) && $k < 3) {

                    $sum += $v->price;
                }
            }



            $all_reports = DB::table('reports as r')
                    ->leftJoin('sub_category as sc', 'sc.id', '=', 'r.sub_category_id')
                    ->select('r.*', 'sc.name')
                    ->where('r.status', 1)
                    ->where('r.sub_category_id', $id)

//                                ->orderBy('r.popular_count','DESC')
//                                ->limit(6)
                    ->get();



            $sub_category = DB::table('sub_category')
                    ->select('*')
                    ->where('category_id', REPORTS)
                    ->where('status', 1)
                    ->get();


            $data['sub_category'] = isset($sub_category) ? $sub_category : '';

            $data['reports_name'] = isset($reports_name->name) ? $reports_name->name : '';

            $data['regular_price'] = $sum;

            $data['reports'] = $reports;

            $data['all_reports'] = $all_reports;

            $data['title'] = isset($reports_name->name) ? $reports_name->name : '';

            $data['description'] = isset($reports_name->description) ? $reports_name->description : '';

            CommonHelper::add_breadcrumb("Reports", url('reports'));

            CommonHelper::add_breadcrumb(isset($reports_name->name) ? $reports_name->name : '', '');

            return view('Frontend.reports.details')->with($data);
        }
    }

    public function book_details($id) {



        $data = array();



        if (isset($id) && $id != "") {



            $count_update = DB::table('reports')
                    ->where('id', $id)
                    ->increment('popular_count');





            $book_detail = DB::table('reports as r')
                    ->leftJoin('sub_category as sc', 'sc.id', '=', 'r.sub_category_id')
                    ->select('*', 'r.id as r_id', 'r.description as description')
                    ->where('r.id', $id)
                    ->where('r.status', 1)
                    ->first();



            $childReportList = DB::table('report_data as r')
                    ->select('r.*')
                    ->where('r.report_id', $id)
                    ->where('r.parent_id', '>', 0)
                    ->where('r.status', 1);

            //->orderByRaw('r.parent_id ASC, r.display_order ASC');



            $reportList = DB::table('report_data as r')
                    ->select('r.*')
                    ->where('r.report_id', $id)
                    ->where('r.parent_id', 0)
                    ->where('r.status', 1)
                    ->unionAll($childReportList)
                    ->orderBy('parent_id', 'ASC')
                    ->orderBy('display_order', 'ASC')
                    ->get();



            $bookChapterDetails = array();

            if (!empty($reportList)) {

                foreach ($reportList as $report) {

                    if (isset($report->parent_id) && $report->parent_id == 0) {

                        $bookChapterDetails[$report->id]['title_name'] = $report->title_name;

                        $bookChapterDetails[$report->id]['title_description'] = $report->title_description;

                        $bookChapterDetails[$report->id]['display_order'] = $report->display_order;
                    } else {

                        $bookChapterDetails[$report->parent_id]['sub_chapter'][] = $report;
                    }
                }
            }

            $isDownload = 0;

            if (isset(Auth::user()->id) && Auth::user()->id != "") {

                $isOrdered = DB::table('orders')
                        ->select('*')
                        ->where('report_id', $id)
                        ->where('user_id', Auth::user()->id)
                        ->first();



                if (!empty($isOrdered)) {

                    $isDownload = 1;
                }
            }



            $data['isDownload'] = $isDownload;

            $data['book_detail'] = $book_detail;

            $data['bookChapterDetails'] = $bookChapterDetails;

            $data['title'] = isset($book_detail->title) ? $book_detail->title : '';



            CommonHelper::add_breadcrumb("Reports", url('reports'));

            CommonHelper::add_breadcrumb(isset($book_detail->title) ? $book_detail->title : '', '');

            return view('Frontend.reports.book_details')->with($data);
        }
    }

    public function report_download($id) {



        if (isset($id) && $id != "") {



            $book_detail = DB::table('reports')
                    ->select('*')
                    ->where('id', $id)
                    ->where('status', 1)
                    ->first();



            if (!empty($book_detail)) {



                if (isset($book_detail->report_doc) && $book_detail->report_doc != "") {

                    $path = public_path() . '/upload/reports/' . $book_detail->report_doc;

                    return response()->download($path);
                } else {

                    return "No document available for this book.";
                }
            }
        }
    }

    public function coming_soon() {



        CommonHelper::add_breadcrumb("Reports", url('reports'));

        CommonHelper::add_breadcrumb('Overview studies & reports', '');



        return view('Frontend.reports.coming_soon');
    }

    public function download_report($id) {



        if (Auth::check()) {

            $isOrdered = DB::table('orders')
                    ->select('*')
                    ->where('report_id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();



            if (empty($isOrdered)) {

                Session::flash('alert-danger', 'Please purchase this item to download!');

                return Redirect::intended('/reports/book/' . $id);
            }



            $book_detail = DB::table('reports')
                    ->select('*')
                    ->where('id', $id)
                    ->where('status', ACTIVE)
                    ->first();



            if (!empty($book_detail)) {



                if (isset($book_detail->report_doc) && $book_detail->report_doc != "") {
                    if (file_exists(public_path() . '/upload/reports/' . $book_detail->report_doc)) {
                        $path = public_path() . '/upload/reports/' . $book_detail->report_doc;

                        return response()->download($path);
                    } else {
                        Session::flash('alert-danger', 'No document available for this book.');

                        return Redirect::intended('/reports/book/' . $id);
                    }
                } else {

//                    return "No document available for this book.";

                    Session::flash('alert-danger', 'No document available for this book.');

                    return Redirect::intended('/reports/book/' . $id);
                }
            } else {

                Session::flash('alert-danger', 'No document available for this book.');

                return Redirect::intended('/reports/book/' . $id);
            }
        } else {

            return Redirect::intended('/login');
        }
    }

}
