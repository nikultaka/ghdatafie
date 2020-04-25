<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\SiteSetting as site;
use App\Helper\CommonHelper;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller {

    public function __construct() {

        $this->middleware('contributor');
    }

    public function index() {



        $sub_category = DB::table('sub_category')
                ->select('*')
                ->where('category_id', REPORTS)
                ->where('status', ACTIVE)
                ->get();



        $data['sub_category'] = $sub_category;



        return view('Admin.reports.add')->with($data);
    }

    public function reports_list() {

        return view('Admin.reports.reports_list');
    }

    public function add(Request $request) {

        $data = array();

        $result = array();

        $result['status'] = 0;



        $post = $request->input();


        if ($request->hasFile('report_doc')) {

            $this->validate($request, [

                'report_doc' => 'required|file|mimes:pdf,docx,doc,txt|max:2048',
            ]);



            $file = $request->file('report_doc');



            $filename = basename($file->getClientOriginalName());

            $extension = pathinfo($filename, PATHINFO_EXTENSION);



            $destinationPath = public_path() . '/upload/reports';



            $uniquesavename = time() . uniqid(rand());

            $destFile = $uniquesavename . '.' . $extension;



            if ($file->move($destinationPath, $destFile)) {

                $upload_resultdoc = 1;

                $data['report_doc'] = $destFile;
            } else {

                $result['status'] = 0;

                $result['msg'] = "Document Uploading fail";
            }
        } else {

            $upload_resultdoc = 1;
        }



        if ($request->hasFile('inphographic_image')) {

            $this->validate($request, [

                'inphographic_image' => 'required|file|max:2048',
            ]);



            $file = $request->file('inphographic_image');



            $filename = basename($file->getClientOriginalName());

            $extension = pathinfo($filename, PATHINFO_EXTENSION);



            if (!file_exists(public_path() . '/upload/reports/infographic')) {

                mkdir('path/to/directory', 0777, true);
            }

            $destinationPath = public_path() . '/upload/reports/infographic';



            $uniquesavename = time() . uniqid(rand());

            $destFile = $uniquesavename . '.' . $extension;



            if ($file->move($destinationPath, $destFile)) {

                $upload_infographic = 1;

                $data['infographic_image'] = $destFile;
            } else {

                $result['status'] = 0;

                $result['msg'] = "Document Uploading fail";
            }
        } else {

            $upload_infographic = 1;
        }



        if (!empty($post) && $upload_resultdoc == 1 && $upload_infographic == 1) {

            if (isset($post['id'])) {

                $id = $post['id'];
            }

            $data['sub_category_id'] = isset($post['sub_category_id']) ? $post['sub_category_id'] : '';

            $data['title'] = isset($post['title']) ? $post['title'] : '';

            $data['title_on_book'] = isset($post['title_on_book_icon']) ? $post['title_on_book_icon'] : '';

            $data['font_size_on_book'] = isset($post['font_size_on_book_icon']) ? $post['font_size_on_book_icon'] : NULL;

            $data['book_icon'] = isset($post['book_icon']) ? $post['book_icon'] : '';

            $data['description'] = isset($post['description']) ? $post['description'] : '';

            $data['price'] = isset($post['price']) ? $post['price'] : '';

            $data['pages'] = isset($post['pages']) ? $post['pages'] : '';

            $data['language'] = isset($post['language']) ? $post['language'] : '';

            $data['release_date'] = isset($post['release_date']) ? $post['release_date'] : '';

            $data['status'] = isset($post['status']) ? $post['status'] : 0;



            if (isset($post['id']) && $post['id'] != '') {



                $data['updated_at'] = date("Y-m-d h:i:s");



                $returnresult = DB::table('reports')
                        ->where('id', $id)
                        ->update($data);



                if ($returnresult) {

                    $result['status'] = 1;

                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {
                $userId = Auth::id();

                $data['user_id'] = $userId;

                $data['created_at'] = date("Y-m-d h:i:s");

                $insert = DB::table('reports')->insert($data);

                if ($insert) {

                    $result['status'] = 1;

                    $result['msg'] = "Record add sucessfully..!";
                }
            }
        }

        echo json_encode($result);

        exit;
    }

    public function edit($id) {

        $data = array();

        if ($id != "") {



            $sub_category = DB::table('sub_category')
                    ->select('*')
                    ->where('category_id', REPORTS)
                    ->where('status', 1)
                    ->get();



            $data['sub_category'] = $sub_category;



            $reports = DB::table('reports')
                            ->where('id', '=', $id)->first();

            $data['reports'] = $reports;
        }

        return view("Admin.reports.add")->with($data);
    }

    public function report_data_refresh(Request $request) {



        $data = array();

        $post = $request->input();



        if (!empty($post)) {



            $report_data = DB::table('report_data')
                    ->where('report_id', '=', $post['report_id'])
                    ->where('parent_id', '=', 0)
                    ->where('status', '!=', -1)
                    ->orderBy('display_order', 'ASC')
                    ->get();



            $sub_report_data = DB::table('report_data')
                    ->where('report_id', '=', $post['report_id'])
                    ->where('parent_id', '!=', 0)
                    ->where('status', '!=', -1)
                    ->orderBy('display_order', 'ASC')
                    ->get();



            $string = "";

            $string = '<div id="accordion">';

            if (!empty($report_data)) {

                foreach ($report_data as $key => $value) {

                    $string .= '<div class="" data-report_id="' . $value->report_id . '" style="width: 100%;">

                                    <input type="hidden" name="text[]" class="menu form-control" data-id="' . $value->display_order . '" value="' . $value->id . '">

                                    <h3 class="sortable_h3"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span> ' . $value->title_name . '

                                        <div style="float: right;">

                                            <i class="fa fa-plus add_subreport_data" aria-hidden="true"  data-id="' . $value->id . '" data-report_id="' . $value->report_id . '" style="margin: 0px 5px 0px 5px;font-size: 23px;cursor:pointer;"></i>

                                            <i class="fa fa-pencil-square-o edit_report_data" aria-hidden="true" data-id="' . $value->id . '" style="margin: 0px 5px 0px 5px;font-size: 23px;cursor:pointer;"></i>

                                            <i class="fa fa-trash delete_report_data" aria-hidden="true" data-id="' . $value->id . '" style="margin: 0px 5px 0px 5px;font-size: 23px;cursor:pointer;"></i>

                                        </div>

                                    </h3>

                                    <div class="sortable_div">

                                    <p>

                                    <div class="accordion1">';

                    if (!empty($sub_report_data)) {

                        foreach ($sub_report_data as $k => $v) {

                            if ($v->parent_id == $value->id) {

                                $color = "";

                                if ($v->status == 0) {

                                    $color = "background-color:lightgray";
                                }

                                $string .= ' <p style="display:flex;' . $color . '">'
                                        . '<span style="width:100%;"><input type="hidden" name="sub_text[' . $v->parent_id . '][]" class="menu form-control" data-id="' . $v->display_order . '" value="' . $v->id . '">

                                                            <i class="fa fa-arrows-v" ></i> ' . $v->title_name . '</span>'
                                        . '<span style="display:flex;"><i class="fa fa-pencil-square-o edit_subreport_data" aria-hidden="true" data-id="' . $v->id . '" style="margin: 0px 5px 0px 5px;font-size: 23px;cursor:pointer;"></i>'
                                        . '<i class="fa fa-trash delete_subreport_data" aria-hidden="true" data-id="' . $v->id . '" style="margin: 0px 5px 0px 5px;font-size: 23px;cursor:pointer;"></i></span></p>';
                            }
                        }
                    }

                    $string .= '</div>

                                    </p>

                                    </div>

                                    

                                </div>';
                }
            }



            $string .= '</div>';



            $data['status'] = 1;

            $data['content'] = $string;
        }



        echo json_encode($data);

        exit;
    }

    public function report_data($id) {



        $data = array();

        if ($id != "") {

            $report_data = DB::table('report_data')
                    ->where('report_id', '=', $id)
                    ->where('parent_id', '=', 0)
                    ->where('status', '!=', -1)
                    ->orderBy('display_order', 'ASC')
                    ->get();



            $sub_report_data = DB::table('report_data')
                    ->where('report_id', '=', $id)
                    ->where('parent_id', '!=', 0)
                    ->where('status', '!=', -1)
                    ->orderBy('display_order', 'ASC')
                    ->get();





            $data['id'] = $id;

            $data['report_data'] = $report_data;

            $data['sub_report_data'] = $sub_report_data;



            return view("Admin.reports.add_report_data")->with($data);
        }
    }

    public function edit_report_data(Request $request) {

        $data = array();



        $data['status'] = 0;

        $post = $request->input();



        if (!empty($post)) {



            $report_data = DB::table('report_data')
                    ->select('*')
                    ->where('id', $post['id'])
                    ->where('status', '!=', -1)
                    ->first();

            $data['status'] = 1;

            $data['content'] = $report_data;
        }

        echo json_encode($data);

        exit;
    }

    public function edit_subreport_data(Request $request) {

        $data = array();



        $data['status'] = 0;

        $post = $request->input();



        if (!empty($post)) {



            $report_data = DB::table('report_data')
                    ->select('*')
                    ->where('id', $post['id'])
                    ->where('status', '!=', -1)
                    ->first();

            $data['status'] = 1;

            $data['content'] = $report_data;
        }

        echo json_encode($data);

        exit;
    }

    public function sort_report_data(Request $request) {



        $post = $request->input();

        $data = array();



        if (!empty($post)) {



            $menu = $post['text'];

            foreach ($menu as $key => $value) {

                $key++;

                DB::table('report_data')
                        ->where('id', '=', $value)
                        ->update(array('display_order' => $key));
            }
        }
    }

    public function sort_subreport_data(Request $request) {



        $post = $request->input();

        $data = array();



        if (!empty($post)) {



            $menu = $post['sub_text'];

            foreach ($menu as $key => $value) {

                foreach ($value as $k => $v) {

                    $k++;

                    DB::table('report_data')
                            ->where('id', '=', $v)
                            ->update(array('display_order' => $k));
                }
            }
        }
    }

    public function add_report_data(Request $request) {



        $post = $request->input();

        $result = array();

        $result['status'] = 0;



        if (!empty($post)) {



            $data = array();

            $data['report_id'] = isset($post['report_id']) ? $post['report_id'] : "";

            $data['title_name'] = isset($post['title_name']) ? $post['title_name'] : "";

            $data['title_description'] = isset($post['title_description']) ? $post['title_description'] : "";

            $data['status'] = isset($post['status']) ? $post['status'] : '';





            if (isset($post['id']) && $post['id'] != '') {



                $id = $post['id'];



                $data['updated_at'] = date("Y-m-d h:i:s");



                $returnresult = DB::table('report_data')
                        ->where('id', $id)
                        ->update($data);



                if ($returnresult) {



                    $result['status'] = 1;

                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {



                $display_order = DB::table('report_data')
                        ->select('display_order')
                        ->where('report_id', '=', $post['report_id'])
                        ->where('parent_id', '=', 0)
                        ->where('status', '!=', -1)
                        ->orderBy('display_order', 'DESC')
                        ->limit(1)
                        ->first();



                if (!empty($display_order)) {

                    $data['display_order'] = isset($display_order->display_order) ? $display_order->display_order + 1 : "";
                } else {

                    $data['display_order'] = 1;
                }



                $data['created_at'] = date("Y-m-d h:i:s");

                if (DB::table('report_data')->insert($data)) {

                    $result['status'] = 1;

                    $result['msg'] = "Record add sucessfully..!";
                }
            }
        }



        echo json_encode($result);

        exit;
    }

    public function add_subreport_data(Request $request) {



        $post = $request->input();

        $result = array();

        $result['status'] = 0;



        if (!empty($post)) {



            $data = array();

            $data['report_id'] = isset($post['sub_report_id']) ? $post['sub_report_id'] : "";

            $data['parent_id'] = isset($post['sub_parent_id']) ? $post['sub_parent_id'] : "";

            $data['title_name'] = isset($post['sub_title_name']) ? $post['sub_title_name'] : "";

            $data['status'] = isset($post['sub_status']) ? $post['sub_status'] : '';





            if (isset($post['sub_id']) && $post['sub_id'] != '') {



                $id = $post['sub_id'];



                $data['updated_at'] = date("Y-m-d h:i:s");



                $returnresult = DB::table('report_data')
                        ->where('id', $id)
                        ->update($data);



                if ($returnresult) {



                    $result['status'] = 1;

                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {



                $display_order = DB::table('report_data')
                        ->select('*')
                        ->where('report_id', '=', $post['sub_report_id'])
                        ->where('parent_id', '=', $post['sub_parent_id'])
                        ->where('status', '!=', -1)
                        ->orderBy('display_order', 'DESC')
                        ->limit(1)
                        ->first();



                if (!empty($display_order)) {

                    $data['display_order'] = isset($display_order->display_order) ? $display_order->display_order + 1 : "";
                } else {

                    $data['display_order'] = 1;
                }



                $data['created_at'] = date("Y-m-d h:i:s");



                if (DB::table('report_data')->insert($data)) {

                    $result['status'] = 1;

                    $result['msg'] = "Record add sucessfully..!";
                }
            }
        }



        echo json_encode($result);

        exit;
    }

    public function delete_report_data(Request $request) {



        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';

            if ($id != "") {



                DB::table('report_data')
                        ->where('id', $id)
                        ->orwhere('parent_id', $id)
                        ->update(array('status' => -1));



                $data_result['status'] = 1;

                $data_result['msg'] = "Record deleted successfully.";
            }
        }

        echo json_encode($data_result);

        exit;
    }

    public function delete_subreport_data(Request $request) {



        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';

            if ($id != "") {



                DB::table('report_data')
                        ->where('id', $id)

//                        ->orwhere('parent_id', $id)
                        ->update(array('status' => -1));



                $data_result['status'] = 1;

                $data_result['msg'] = "Record deleted successfully.";
            }
        }

        echo json_encode($data_result);

        exit;
    }

    public function delete(Request $request) {



        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';

            if ($id != "") {



                DB::table('reports')
                        ->where('id', $id)
                        ->update(array('status' => -1));



                $data_result['status'] = 1;

                $data_result['msg'] = "Record deleted successfully.";
            }
        }

        echo json_encode($data_result);

        exit;
    }

    public function reports_data_table() {



        $requestData = $_REQUEST;



        $data = array();



        //This is for order 

        $columns = array(
            0 => 'r.id',
            1 => 'r.title',
            2 => 'u.name',
            3 => 'sc.name',
            4 => 'r.price',
            5 => 'r.pages',
            6 => 'r.language',
            7 => 'r.release_date',
            8 => 'downloads',
            9 => 'r.popular_count',
            10 => 'u.role_id',
        );





        $select_query = DB::table('reports as r')
                ->leftJoin('sub_category as sc', 'sc.id', '=', 'r.sub_category_id')
                ->leftJoin('category as c', 'c.id', '=', 'sc.category_id')
                ->leftJoin('users as u', 'u.id', '=', 'r.user_id')
                ->where('r.status', '!=', -1);



        if (Auth::user()->role_id == CONTRIBUTOR_ROLE) {

            $select_query->where('r.user_id', Auth::user()->id);
        }

        $select_query->select('r.*', 'sc.name as cat_name', DB::raw("(select count(id) from orders where report_id=r.id) as downloads"), 'u.name', 'u.role_id');

        
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $searchValue = $requestData['search']['value'];

            $select_query->whereRaw("(r.title LIKE '%" . $searchValue . "%' OR "
                    . "u.name LIKE '%" . $searchValue . "%' OR "
                    . "r.price LIKE '%" . $searchValue . "%' OR "
                    . "r.pages LIKE '%" . $searchValue . "%' OR "
                    . "r.language LIKE '%" . $searchValue . "%' OR "
                    . "r.popular_count LIKE '%" . $searchValue . "%' OR "
                    . "sc.name LIKE '%" . $searchValue . "%' OR "
                    . "r.release_date LIKE '%" . $searchValue . "%'"
                    . ")");
        }



        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {

            $order_by = $columns[$requestData['order'][0]['column']];

            $select_query->orderBy($order_by, $requestData['order'][0]['dir']);
        } else {

            $select_query->orderBy("r.created_at", "DESC");
        }

        if (isset($requestData['filter_status']) && $requestData['filter_status'] != '') {

            $select_query->where('r.status', $requestData['filter_status']);
        }

        //This is for count

        $totalData = $select_query->count();



        //This is for pagination

        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {

            $select_query->offset($requestData['start']);

            $select_query->limit($requestData['length']);
        }



        $reports_list = $select_query->get();



        foreach ($reports_list as $row) {
            if($row->status == APPROVE){
                $temp['status'] = "Approved";
            } else if($row->status == REJECT){
                $temp['status'] = "Rejected";
            } else{
                $temp['status'] = "Pending";
            }

            $temp['id'] = $row->id;

            $temp['created_by'] = $row->name;
            
            $temp['cat_name'] = $row->cat_name;

            $temp['title'] = $row->title;

            $temp['price'] = $row->price;

            $temp['pages'] = $row->pages;

            $temp['language'] = $row->language;

            $temp['release_date'] = $row->release_date;

//            $temp['downloads'] = 0;

            $temp['downloads'] = $row->downloads;

            $temp['views'] = $row->popular_count;

            $id = $row->id;



            if (Auth::user()->role_id == CONTRIBUTOR_ROLE && $row->status == 'Approved') {

                $action = '<div class="datatable_btn" style="display:flex;">';

                $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_reports"> Delete</a> &nbsp;</div>';
            } else {

                $action = '<div class="datatable_btn" style="display:flex;">';

                $action .= '<a href="edit/' . $id . '" data-id="' . $id . '" class="btn btn-xs btn-info btnEdit_reports"> Edit</a>  	&nbsp;';

                $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_reports"> Delete</a> &nbsp; '
                        . '<a href="report_data/' . $id . '"" data-id="' . $id . '" class="btn btn-xs btn-info btninfo_reports"> Info</a></div>';
            }



            $temp['action'] = $action;

            $data[] = $temp;

            $id = "";
        }





        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $data,
            "role" => Auth::user()->role_id
        );

        echo json_encode($json_data);

        exit(0);
    }

    public function status_apporovied(Request $request) {

        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';



            if (!empty($id)) {



                DB::table('reports')
                        ->whereIn('id', $id)
                        ->update(array('status' => APPROVE));



                $data_result['status'] = 1;

                $data_result['msg'] = "Reports approved successfully.";
            }
        }

        echo json_encode($data_result);

        exit;
    }
    
    public function status_rejected(Request $request) {

        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';



            if (!empty($id)) {



                DB::table('reports')
                        ->whereIn('id', $id)
                        ->update(array('status' => REJECT));



                $data_result['status'] = 1;

                $data_result['msg'] = "Reports rejected successfully.";
            }
        }

        echo json_encode($data_result);

        exit;
    }

    public function generateReportImage() {

        $string = '';

        $upload_image = 'public/new_frontend/img/common_book_image.png';

        $font = 10; //By Default

        $line_height = 20;

        $padding = 15;
        $i = 25;

        if (isset($_POST['book_title']) && $_POST['book_title'] != '') {
            $string = $_POST['book_title'];
        }
        if (isset($_POST['book_title_size']) && $_POST['book_title_size'] != '') {
            $font = $_POST['book_title_size'];
        }
        if (isset($_POST['id']) && $_POST['id'] != '') {
            $id = $_POST['id'];
        } else {
            $last_row = DB::table('reports')->orderby('id', 'desc')->first();
            $id = $last_row->id + 1;
        }

        $info = pathinfo($upload_image);

        $file_name = $info['filename'] . '_' . $id . '.' . $info['extension'];

        $thumbnail = 'public/upload/reports/books_icon/' . $file_name;

        $width = imagefontwidth($font) * strlen($string);

        $im = imagecreatefrompng($upload_image);

        $text = wordwrap($string, ($width / 10) - 15);

        $lines = explode("\n", $text);



        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);

        // Replace path by your own font path
        $font_file = dirname(__FILE__) . '/Raleway-Bold.ttf';
        foreach ($lines as $line) {
            imagettftext($im, $font, 0, $padding, $i, $white, $font_file, trim($line));
            $i += $line_height;
        }



        imagepng($im, $thumbnail, 1, 0);

        $result['status'] = TRUE;
        $result['id'] = $id;
        $result['image'] = $file_name . "?rand=" . time();
        $result['file_name'] = $file_name;


        echo json_encode($result);

        exit;
    }

}
