<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;

class InfographicsController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {

        $data_result = array();
        $category = DB::table('sub_category as sc')
                    ->leftJoin('category as c', 'c.id', '=', 'sc.category_id')
                    ->where('c.id', '=', INFOGRAPHICS)
                    ->select('sc.*','c.name as cname')
                    ->where('sc.status', '=', ACTIVE)
                    ->get();
        
        $data_result['category'] = $category;
        
        //THis is to get user list
        $users = DB::table('users as u')
                    ->select('u.id','u.name')
                    ->where('u.status', '=', ACTIVE)
                    ->get();
        
        $data_result['users'] = $users;
        
        
        return view('Admin.infographics.add')->with($data_result);
    }

    public function news_list() {
        return view('Admin.infographics.list');
    }

    public function add(Request $request) {
        $data = array();
        $result = array();
        $result['status'] = 0;
        
        $post = $request->input();

        if ($request->hasFile('infographics_image')) {
             $this->validate($request, [
                    'infographics_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $image = $request->file('infographics_image');
            $filename = basename($image->getClientOriginalName());
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (!file_exists(public_path() . '/upload/infographics/thumbnail/')) {
                mkdir(public_path() . '/upload/infographics/thumbnail/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/infographics/thumbnail/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $input['media_name'] = $destFile;
//            $img = Image::make($image->getRealPath())->resize(500, 500);
            $img  = Image::make($image->getRealPath())->resize(500, 500, function($constraint)
            {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath . '/' . $input['media_name']);

            if (!file_exists(public_path() . '/upload/infographics/')) {
                mkdir(public_path() . '/upload/infographics/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/infographics/';

            $destFile = $uniquesavename . '.' . $extension;

            // $upload_success = $image->move(public_path('upload/image'),$imageName);

            if ($image->move($destinationPath, $destFile)) {
               $upload_result = 1; 
               $data['image'] = $destFile;
            }
            // Else, return error 400
            else {
                $result['status'] = 0;
                 $result['msg'] = "Image Uploading fail";
            }
        }else{
//            $data['image'] = isset($post['hdn_infographics_image']) ? $post['hdn_infographics_image'] : '';
            $upload_result = 1;
        }

        if (!empty($post) && $upload_result = 1) {
            if (isset($post['id'])) {
                $id = $post['id'];
            }

            $data['category_id'] = isset($post['category_id']) ? $post['category_id'] : '';
            $data['user_id'] = isset($post['user_id']) ? $post['user_id'] : '';
            $data['title'] = isset($post['title']) ? $post['title'] : '';
            $data['short_desc'] = isset($post['short_desc']) ? $post['short_desc'] : '';
            $data['description'] = isset($post['description']) ? $post['description'] : '';
            $data['publish_date'] = isset($post['publish_date']) ? $post['publish_date'] : '';
            $data['image_data'] = isset($post['image_data']) ? $post['image_data'] : '';
            $data['status'] = isset($post['status']) ? $post['status'] : '';
            
            if (isset($post['id']) && $post['id'] != '') {

                $data['updated_at'] = date("Y-m-d h:i:s");

                $returnresult = DB::table('infographics')
                        ->where('id', $id)
                        ->update($data);

                if ($returnresult) {
                    $result['status'] = 1;
                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {
                $data['created_at'] = date("Y-m-d h:i:s");
                if(DB::table('infographics')->insert($data)) {
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

            $category = DB::table('sub_category as sc')
                    ->leftJoin('category as c', 'c.id', '=', 'sc.category_id')
                    ->where('c.id', '=', INFOGRAPHICS)
                    ->select('sc.*','c.name as cname')
                    ->where('sc.status', '=', 1)
                    ->get();
        
            $data['category'] = $category;
            
            //THis is to get user list
            $users = DB::table('users as u')
                    ->select('u.id','u.name')
                    ->where('u.status', '=', ACTIVE)
                    ->get();
        
            $data['users'] = $users;
        
            $infographics = DB::table('infographics')
                    ->where('id', '=', $id)
                    ->where('status', '!=', -1)
                    ->first();

            $data['infographics'] = $infographics;
        }
        return view("Admin.infographics.add")->with($data);
    }

    public function delete(Request $request) {

        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;

        if (!empty($post)) {
            $id = isset($post['id']) ? $post['id'] : '';
            if ($id != "") {

                DB::table('infographics')
                        ->where('id', $id)
                        ->update(array('status' => -1));

                $data_result['status'] = 1;
                $data_result['msg'] = "Record deleted successfully.";
            }
        }
        echo json_encode($data_result);
        exit;
    }

    public function infographics_data_table() {

        $requestData = $_REQUEST;

        $data = array();

        //This is for order 
        $columns = array(
            0. => 'i.title',
            1 => 'sc.name',
            2 => 'i.short_desc',
//            3 => 'description',
            3 => 'i.publish_date',
            4 => 'i.image',
            5 => 'i.created_at',
            6 => 'i.status',
        );

        $select_query = DB::table('infographics as i')
                        ->leftJoin('sub_category as sc', 'sc.id', '=', 'i.category_id')
                        ->leftJoin('category as c', 'c.id', '=', 'sc.category_id')
                        ->where('i.status', '!=', -1);

        $select_query->select('i.*','sc.name as sc_name', DB::raw("IF(i.status = 1,'Active','Inactive') as status"));
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $select_query->where("i.title", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("sc.name", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("i.short_desc", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("i.publish_date", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("i.created_at", "like", '%' . $requestData['search']['value'] . '%');
        }

        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {
            $order_by = $columns[$requestData['order'][0]['column']];
            $select_query->orderBy($order_by, $requestData['order'][0]['dir']);
        } else {
            $select_query->orderBy("created_at", "DESC");
        }

        //This is for count
        $totalData = $select_query->count();

        //This is for pagination
        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {
            $select_query->offset($requestData['start']);
            $select_query->limit($requestData['length']);
        }

        $infographics_list = $select_query->get();
        
        foreach ($infographics_list as $row) {

            $temp['id'] = $row->id;
            $temp['title'] = $row->title;
            $temp['sc_name'] = $row->sc_name;
            $temp['short_desc'] = $row->short_desc;
//            $temp['description'] = $row->description;
            $temp['publish_date'] = $row->publish_date;
            $temp['created_at'] = $row->created_at;
            $temp['status'] = $row->status;
            if(isset($row->image) && $row->image != '' ){ 
                $url =   ASSET.'upload/infographics/thumbnail/'.$row->image;
              }else{
                  $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
              } 
            $temp['infographics_image'] = '<div class="datatable_btn"><img style="width: 50px;" src="'.url($url).'"></div>';
            $id = $row->id;

            $action = '<div class="datatable_btn" style="display:flex;"><a href="edit/' . $id . '" data-id="' . $id . '" class="btn btn-xs btn-info"> Edit</a>  	&nbsp;';
            $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_infographics"> Delete</a></div>';


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

}
