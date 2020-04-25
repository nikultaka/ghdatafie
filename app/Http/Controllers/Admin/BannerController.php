<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        
        return view("Admin.banner.list");
    }
//    public function banner_list(){
//        return view("Admin.banner.list");
//    }
    public function add(Request $request){
        $data = array();
        $result = array();
        $result['status'] = 0;
       

        if ($request->hasFile('banner_image')) {
             $this->validate($request, [
                    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $image = $request->file('banner_image');
            $filename = basename($image->getClientOriginalName());
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (!file_exists(public_path() . '/upload/image/banner/resize/')) {
                mkdir(public_path() . '/upload/image/banner/resize/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/image/banner/resize/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $input['media_name'] = $destFile;
            $img = Image::make($image->getRealPath())->resize(1349, 364);
            $img->save($destinationPath . '/' . $input['media_name']);

            if (!file_exists(public_path() . '/upload/image/banner/')) {
                mkdir(public_path() . '/upload/image/banner/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/image/banner/';

            $destFile = $uniquesavename . '.' . $extension;

            // $upload_success = $image->move(public_path('upload/image'),$imageName);

            if ($image->move($destinationPath, $destFile)) {
               $upload_result = 1; 
               $data['banner'] = $destFile;
            }
            // Else, return error 400
            else {
                $result['status'] = 0;
                 $result['msg'] = "Image Uploading fail";
            }
        }else{
            $upload_result = 1;
        }
        $post = $request->input();
        if (!empty($post) && $upload_result = 1) {
            if (isset($post['id'])) {
                $id = $post['id'];
            }

            $data['title'] = isset($post['title']) ? $post['title'] : '';
            if($post['add_page_name'] != ''){
                $data['page_slug'] = isset($post['add_page_name']) ? $post['add_page_name'] : '';
            }else{
                $data['page_slug'] = isset($post['page_name']) ? $post['page_name'] : '';
            }
            $data['status'] = isset($post['status']) ? $post['status'] : '';
            
            if (isset($post['id']) && $post['id'] != '') {

                $data['gm_updated'] = date("Y-m-d h:i:s");

                $returnresult = DB::table('banner')
                        ->where('id', $id)
                        ->update($data);

                if ($returnresult) {
                    $result['status'] = 1;
                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {
                $data['gm_created'] = date("Y-m-d h:i:s");
                if (DB::table('banner')->insert($data)) {
                    $result['status'] = 1;
                    $result['msg'] = "Record add sucessfully..!";
                }
            }
        }
        echo json_encode($result);
        exit;
    }
    public function edit(Request $request){
        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;

        if (!empty($post)) {
            $id = isset($post['id']) ? $post['id'] : '';
            if ($id != "") {

                $banner = DB::table('banner')
                                ->where('id', '=', $id)->first();

                $data_result['status'] = 1;
                $data_result['content'] = $banner;
            }
        }
        echo json_encode($data_result);
        exit;
    }
    
    public function delete(Request $request){
        
        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;

        if (!empty($post)) {
            $id = isset($post['id']) ? $post['id'] : '';
            if ($id != "") {

                DB::table('banner')
                        ->where('id', $id)
                        ->update(array('status' => -1));

                $data_result['status'] = 1;
                $data_result['msg'] = "Record deleted successfully.";
            }
        }
        echo json_encode($data_result);
        exit;
    }
    
     public function data_table() {

        $requestData = $_REQUEST;

        $data = array();

        //This is for order 
        $columns = array(
//            0. => 'id',
            0 => 'title',
            1 => 'page_slug',
            2 => 'banner',
            3 => 'gm_created',
            4 => 'status',
            
        );

        $select_query = DB::table('banner')
                ->where('status', '!=', -1);

        $select_query->select('*', DB::raw("IF(status = 1,'Active','Inactive') as status"));
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $select_query->where("title", "like", '%' . $requestData['search']['value'] . '%');
        }

        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {
            $order_by = $columns[$requestData['order'][0]['column']];
            $select_query->orderBy($order_by, $requestData['order'][0]['dir']);
        } else {
            $select_query->orderBy("gm_created", "DESC");
        }

        //This is for count
        $totalData = $select_query->count();

        //This is for pagination
        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {
            $select_query->offset($requestData['start']);
            $select_query->limit($requestData['length']);
        }

        $banner_list = $select_query->get();
        foreach ($banner_list as $row) {

            $temp['id'] = $row->id;
            $temp['title'] = $row->title;
            $temp['page_name'] = $row->page_slug;
            $temp['gm_created'] = $row->gm_created;
            $temp['status'] = $row->status;
            if(isset($row->banner) && $row->banner != '' ){ 
                $url =   ASSET.'upload/image/banner/resize/'.$row->banner;
              }else{
                  $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
              } 
            $temp['banner'] = '<div class="datatable_btn"><img style="width: 150px; height:50px;" src="'.url($url).'"></div>';
            $id = $row->id;

           $action = '<div class="datatable_btn"><a href="javascript:void(0);" data-id="' . $id . '" class="btn btn-xs btn-info btnEdit_banner"> Edit</a>  	&nbsp;';
            $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_banner "> Delete</a></div>';


            $temp['action'] = $action;
            $data[] = $temp;
            $id = "";
        }


        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $data
        );
        echo json_encode($json_data);
        exit(0);
    }

    public function check_email(Request $request) {

        $post = $request->input();
        $id = $post['id'];
        $email_id = $post['email'];

        $email = DB::table('users')
                ->select('*')
                ->where('id', '!=', $id)
                ->where('status', '!=', -1)
                ->where('email', '=', $email_id)
                ->get();
        $valid = TRUE;
        $email_all = count($email);

        if ($email_all > 0) {
            $valid = FALSE;
        } else {
            $valid = TRUE;
        }
        return json_encode(array('valid' => $valid));
        exit;
    }
}
