<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Helper\CommonHelper;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $data_result = array();
        //$user_role = DB::table('user_role')->where('status', '=', 1)->get();
        //$data_result['user_role'] = $user_role;
        $data_result='';
        return view("Admin.category.category_list")->with($data_result);
    }
    public function add(Request $request){
        $data = array();
        $result = array();
        $result['status'] = 0;

        $post = $request->input();

        if (!empty($post)) {
            $lang_id = CommonHelper::get_selected_language();
            $data['language_id'] = isset($lang_id) ? $lang_id : '1';
            $data['name'] = isset($post['category_name']) ? $post['category_name'] : '';
            $data['description'] = isset($post['description']) ? $post['description'] : '';
            $data['status'] = isset($post['status']) ? $post['status'] : '';


            if (isset($post['category_id']) && $post['category_id'] != '') {
                $id = $post['category_id'];
                $category = DB::table('category')
                                ->where('id', '=', $id)->first();

                $data['updated_at'] = date("Y-m-d h:i:s");
                
                $returnresult = DB::table('category')
                        ->where('id', $id)
                        ->update($data);

                if ($returnresult) {
                    $result['status'] = 1;
                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {

                $data['created_at'] = date("Y-m-d h:i:s");
                if (DB::table('category')->insert($data)) {
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

                $category = DB::table('category')
                                ->where('id', '=', $id)->first();

                $data_result['status'] = 1;
                $data_result['content'] = $category;
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

                DB::table('category')
                        ->where('id', $id)
                        ->update(array('status' => -1));

                $data_result['status'] = 1;
                $data_result['msg'] = "Record deleted successfully.";
            }
        }
        echo json_encode($data_result);
        exit;
    }
    
     public function category_data_table() {
         $lang_id = CommonHelper::get_selected_language();
        $requestData = $_REQUEST;

        $data = array();

        //This is for order 
        $columns = array(
            0 => 'name',
            1 => 'description',
            2 => 'status',
            3 => 'created_at',
            4 => 'updated_at',
            
        );

        $select_query = DB::table('category')
                ->where('status', '!=', -1)
                ->where('language_id',$lang_id);
        $select_query->select('*', DB::raw("IF(status = 1,'Active','Inactive') as status"));
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $select_query->where("name", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("description", "like", '%' . $requestData['search']['value'] . '%');
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

        $category_list = $select_query->get();

        foreach ($category_list as $row) {

            $temp['id'] = $row->id;
            $temp['name'] = $row->name;
            $temp['description'] = $row->description;
            $temp['status'] = $row->status;
            $id = $row->id;

            $action = '<div class="datatable_btn"><a href="javascript:void(0);" data-id="' . $id . '" class="btn btn-xs btn-info btnEdit_category"> Edit</a>  	&nbsp;';
//            $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_category"> Delete</a>'
            $action .= '</div>';


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
