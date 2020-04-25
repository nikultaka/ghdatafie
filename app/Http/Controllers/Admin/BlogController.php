<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helper\CommonHelper;
use Image;
class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {

        return view('Admin.blog.add');
    }

    public function brand_list() {
        return view('Admin.blog.list');
    }

    public function add(Request $request) {
        $data = array();
        $result = array();
        $result['status'] = 0;
       

        if ($request->hasFile('image')) {
             $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $image = $request->file('image');
            $filename = basename($image->getClientOriginalName());
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (!file_exists(public_path() . '/upload/blog/resize/')) {
                mkdir(public_path() . '/upload/blog/resize/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/blog/resize/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $input['media_name'] = $destFile;
            $img = Image::make($image->getRealPath())->resize(500, 500);
            $img->save($destinationPath . '/' . $input['media_name']);

            if (!file_exists(public_path() . '/upload/blog/')) {
                mkdir(public_path() . '/upload/blog/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/blog/';

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
            $upload_result = 1;
        }
        $post = $request->input();
        if (!empty($post) && $upload_result = 1) {
            if (isset($post['id'])) {
                $id = $post['id'];
            }
            $lang_id = CommonHelper::get_selected_language();
            $data['language_id'] = isset($lang_id) ? $lang_id : '1';
            $data['title'] = isset($post['title']) ? $post['title'] : '';
            $data['slug_url'] = isset($post['slug']) ? $post['slug'] : '';
            $data['description'] = isset($post['description']) ? $post['description'] : '';
            $data['meta_title'] = isset($post['meta_title']) ? $post['meta_title'] : '';
            $data['meta_keyword'] = isset($post['meta_keyword']) ? $post['meta_keyword'] : '';
            $data['meta_description'] = isset($post['meta_description']) ? $post['meta_description'] : '';
            $data['status'] = isset($post['status']) ? $post['status'] : '';
            
            if (isset($post['id']) && $post['id'] != '') {

                $data['updated_at'] = date("Y-m-d h:i:s");

                $returnresult = DB::table('blog')
                        ->where('id', $id)
                        ->update($data);

                if ($returnresult) {
                    $result['status'] = 1;
                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {
                $data['created_at'] = date("Y-m-d h:i:s");
                if (DB::table('blog')->insert($data)) {
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

            $brand = DB::table('blog')
                            ->where('id', '=', $id)->first();

            $data['blog'] = $brand;
        }
        return view("Admin.blog.add")->with($data);
    }

    public function check_slug(Request $request) {

        $post = $request->input();

        $id = $post['id'];
        $slug_url = $post['slug'];

        $slug = DB::table('blog')
                ->select('*')
                ->where('id', '!=', $id)
                ->where('status', '!=', -1)
                ->where('slug_url', '=', $slug_url)
                ->get();

        $valid = TRUE;
        $slug_all = count($slug);

        if ($slug_all > 0) {
            $valid = FALSE;
        } else {
            $valid = TRUE;
        }
        return json_encode(array('valid' => $valid));
        exit;
    }

    public function delete(Request $request) {

        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;

        if (!empty($post)) {
            $id = isset($post['id']) ? $post['id'] : '';
            if ($id != "") {

                DB::table('blog')
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
        $lang_id = CommonHelper::get_selected_language();
        $requestData = $_REQUEST;

        $data = array();

        //This is for order 
        $columns = array(
            0 => 'title',
            1 => 'slug_url',
            2 => 'meta_title',
            3 => 'meta_keyword',
            4 => 'image',
            5 => 'created_at',
            6 => 'status',
        );
        
        $select_query = DB::table('blog')
                ->where('status', '!=', -1)
                ->where('language_id',$lang_id);
        $select_query->select('*', DB::raw("IF(status = 1,'Active','Inactive') as status"));
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $select_query->where("title", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("slug_url", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("meta_title", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("meta_keyword", "like", '%' . $requestData['search']['value'] . '%');
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

        $cms_list = $select_query->get();

        foreach ($cms_list as $row) {

            $temp['id'] = $row->id;
            $temp['title'] = $row->title;
            $temp['slug_url'] = $row->slug_url;
            $temp['meta_title'] = $row->meta_title;
            $temp['meta_keyword'] = $row->meta_keyword;
            $temp['created_at'] = $row->created_at;
            $temp['status'] = $row->status;
            if(isset($row->blog) && $row->blog != '' ){ 
                $url =   ASSET.'upload/blog/resize/'.$row->logo;
              }else{
                  $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
              } 
            $temp['image'] = '<div class="datatable_btn"><img style="width: 50px;" src="'.url($url).'"></div>';
            $id = $row->id;

            $action = '<div class="datatable_btn" style="display:flex;"><a href="edit/' . $id . '" data-id="' . $id . '" class="btn btn-xs btn-info"> Edit</a>  	&nbsp;';
            $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_blog"> Delete</a></div>';


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
