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

use Image;



class DatasetController extends Controller {



    public function __construct() {

        $this->middleware('admin');

    }



    public function index() {

        

        $data_result = array();

        $brand = DB::table('brand')->where('status', '=', 1)->get();

        $data_result['brand'] = $brand;

        return view('Admin.dataset.add')->with($data_result);

    }



    public function reports_list() {

        return view('Admin.dataset.dataset_list');

    }



    public function add(Request $request) {

        $data = array();

        $result = array();

        $result['status'] = 0;



        $post = $request->input();

        

        if ($request->hasFile('infographic')) {

             $this->validate($request, [

                    'infographic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]);

            $image = $request->file('infographic');

            $filename = basename($image->getClientOriginalName());

            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            if (!file_exists(public_path() . '/upload/dataset/image/thumbnail/')) {

                mkdir(public_path() . '/upload/dataset/image/thumbnail/', 0777, true);

            }

            $destinationPath = public_path() . '/upload/dataset/image/thumbnail/';

            $uniquesavename = time() . uniqid(rand());

            $destFile = $uniquesavename . '.' . $extension;

            $input['media_name'] = $destFile;

            $img = Image::make($image->getRealPath())->resize(500, 500);

            $img->save($destinationPath . '/' . $input['media_name']);



            if (!file_exists(public_path() . '/upload/dataset/image')) {

                mkdir(public_path() . '/upload/dataset/image', 0777, true);

            }

            $destinationPath = public_path() . '/upload/dataset/image';



            $destFile = $uniquesavename . '.' . $extension;



            // $upload_success = $image->move(public_path('upload/image'),$imageName);



            if ($image->move($destinationPath, $destFile)) {

               $upload_result = 1; 

               $data['fld_infographic'] = $destFile;

            }

            // Else, return error 400

            else {

                $result['status'] = 0;

                 $result['msg'] = "Image Uploading fail";

            }

        }else{

//            $data['fld_infographic'] = "";

            $upload_result = 1;

        }

        

        if ($request->hasFile('dataset_image')) {

             $this->validate($request, [

                    'dataset_image' => 'required|file|mimes:pdf,docx,doc|max:2048',

                ]);

             

            $file = $request->file('dataset_image') ;



            $filename = basename($file->getClientOriginalName());

            $extension = pathinfo($filename, PATHINFO_EXTENSION);



            $destinationPath = public_path().'/upload/dataset/document/' ;



            $uniquesavename = time() . uniqid(rand());

            $destFile = $uniquesavename . '.' . $extension;



            if($file->move($destinationPath,$destFile)) {

                $upload_resultdoc = 1; 

                $data['fld_dataset_image'] = $destFile;

            } else {

                $result['status'] = 0;

                $result['msg'] = "Document Uploading fail";

            }

        } else{

//            $data['fld_dataset_image'] = "";

            $upload_resultdoc = 1;

        }

        

        if ($request->hasFile('infographic_dataset')) {

             $this->validate($request, [

                    'infographic_dataset' => 'required|file|mimes:pdf,docx,doc|max:2048',

                ]);

             

            $file = $request->file('infographic_dataset') ;



            $filename = basename($file->getClientOriginalName());

            $extension = pathinfo($filename, PATHINFO_EXTENSION);



            $destinationPath = public_path().'/upload/dataset/document/' ;



            $uniquesavename = time() . uniqid(rand());

            $destFile = $uniquesavename . '.' . $extension;



            if($file->move($destinationPath,$destFile)) {

                $upload_resultdoc_info = 1; 

                $data['infographic_dataset'] = $destFile;

            } else {

                $result['status'] = 0;

                $result['msg'] = "Document Uploading fail";

            }

        } else{

//            $data['infographic_dataset'] = "";

            $upload_resultdoc_info = 1;

        }

        

        



        if (!empty($post) && $upload_result = 1 && $upload_resultdoc = 1 && $upload_resultdoc_info == 1) {

            if (isset($post['id'])) {

                $id = $post['id'];

            }

            

            

            $data['fld_category_id'] = isset($post['category_id']) ? $post['category_id'] : '';

            $data['fld_dataset_title'] = isset($post['title']) ? $post['title'] : '';

            $data['fld_shortdescription'] = isset($post['short_desc']) ? $post['short_desc'] : '';

            $data['fld_dataset_desc'] = isset($post['description']) ? $post['description'] : '';

            

            $data['fld_dataset_created_date'] = isset($post['meta_created_date']) ? date("Y-m-d H:i:s", strtotime($post['meta_created_date'])) : '';

            $data['fld_dataset_updated_date'] = isset($post['meta_updated_date']) ? date("Y-m-d H:i:s", strtotime($post['meta_updated_date'])) : '';

            $data['fld_dataset_publisher'] = isset($post['publisher']) ? $post['publisher'] : '';

            $data['fld_dataset_maintainer'] = isset($post['maintainer']) ? $post['maintainer'] : '';

            $data['fld_dataset_maintainer_email'] = isset($post['maintainer_email']) ? $post['maintainer_email'] : '';

            $data['topic'] = isset($post['topic']) ? $post['topic'] : '';

            $data['source_url'] = isset($post['source_url']) ? $post['source_url'] : '';

            $data['language'] = isset($post['dataset_language']) ? $post['dataset_language'] : '';

            $data['fld_dataset_status'] = isset($post['status']) ? $post['status'] : '';

            



            if (isset($post['id']) && $post['id'] != '') {



                $returnresult = DB::table('tbl_dataset')

                                ->where('fld_dataset_id', $id)

                                ->update($data);

                

                if ($returnresult) {

                    $result['status'] = 1;

                    $result['msg'] = 'Record updated successfully.!';

                }

            } else {

                if (DB::table('tbl_dataset')->insert($data)) {

                    $result['status'] = 1;

                    $result['msg'] = "Record add sucessfully..!";

                }

            }

        }

        echo json_encode($result);

        exit;

    }



    public function edit($id) {

        $data=array();

        if ($id != "") {



            $brand = DB::table('brand')->where('status', '=', 1)->get();

        

            $dataset = DB::table('tbl_dataset')

                        ->where('fld_dataset_status', '=', 1)

                        ->where('fld_dataset_id', '=', $id)

                        ->first();

            

            $data['brand'] = $brand;

            $data['dataset']=$dataset;

        }

        return view("Admin.dataset.add")->with($data);

    }



//    public function check_slug(Request $request) {

//

//        $post = $request->input();

//

//        $id = $post['id'];

//        $slug_url = $post['slug'];

//

//        $slug = DB::table('reports')

//                ->select('*')

//                ->where('id', '!=', $id)

//                ->where('status', '!=', -1)

//                ->where('slug_url', '=', $slug_url)

//                ->get();

//

//        $valid = TRUE;

//        $slug_all = count($slug);

//

//        if ($slug_all > 0) {

//            $valid = FALSE;

//        } else {

//            $valid = TRUE;

//        }

//        return json_encode(array('valid' => $valid));

//        exit;

//    }



    public function delete(Request $request) {



        $post = $request->input();

        $data_result = array();

        $data_result['status'] = 0;



        if (!empty($post)) {

            $id = isset($post['id']) ? $post['id'] : '';

            if ($id != "") {



                DB::table('tbl_dataset')

                        ->where('fld_dataset_id', $id)

                        ->update(array('fld_dataset_status' => -1));



                $data_result['status'] = 1;

                $data_result['msg'] = "Record deleted successfully.";

            }

        }

        echo json_encode($data_result);

        exit;

    }



    public function dataset_data_table() {



        $requestData = $_REQUEST;



        $data = array();



        //This is for order 

        $columns = array(

//            0. => 'ds.fld_dataset_id',

            0 => 'b.title',

            1 => 'ds.fld_dataset_title',

            2 => 'ds.fld_shortdescription',

            3 => 'ds.fld_dataset_publisher',

            4 => 'ds.fld_dataset_maintainer',

            5 => 'ds.fld_dataset_maintainer_email',

            6 => 'ds.fld_dataset_status',

            7 => 'ds.fld_dataset_created_date',

            8 => 'ds.fld_dataset_updated_date',

        );



        $select_query = DB::table('tbl_dataset as ds')

                        ->leftJoin('brand as b', 'b.id', '=', 'ds.fld_category_id')

                        ->where('ds.fld_dataset_status', '!=', -1);



        $select_query->select('ds.*','b.title as title_name', DB::raw("IF(ds.fld_dataset_status = 1,'Active','Inactive') as status"));

        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {

            $select_query->where("b.title", "like", '%' . $requestData['search']['value'] . '%')

                    ->oRwhere("ds.fld_dataset_title", "like", '%' . $requestData['search']['value'] . '%')

                    ->oRwhere("ds.fld_shortdescription", "like", '%' . $requestData['search']['value'] . '%')

                    ->oRwhere("ds.fld_dataset_publisher", "like", '%' . $requestData['search']['value'] . '%')

                    ->oRwhere("ds.fld_dataset_maintainer", "like", '%' . $requestData['search']['value'] . '%')

                    ->oRwhere("ds.fld_dataset_maintainer_email", "like", '%' . $requestData['search']['value'] . '%');

        }



        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {

            $order_by = $columns[$requestData['order'][0]['column']];

            $select_query->orderBy($order_by, $requestData['order'][0]['dir']);

        } else {

            $select_query->orderBy("ds.fld_dataset_created_date", "DESC");

        }



        //This is for count

        $totalData = $select_query->count();



        //This is for pagination

        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {

            $select_query->offset($requestData['start']);

            $select_query->limit($requestData['length']);

        }



        $dataset_list = $select_query->get();



        foreach ($dataset_list as $row) {



            $temp['id'] = $row->fld_dataset_id;

            $temp['title_name'] = $row->title_name;

            $temp['fld_dataset_title'] = $row->fld_dataset_title;

            $temp['fld_shortdescription'] = $row->fld_shortdescription;

            $temp['fld_dataset_publisher'] = $row->fld_dataset_publisher;

            $temp['fld_dataset_maintainer'] = $row->fld_dataset_maintainer;

            $temp['fld_dataset_maintainer_email'] = $row->fld_dataset_maintainer_email;

            $temp['status'] = $row->status;

            $id = $row->fld_dataset_id;



            $action = '<div class="datatable_btn" style="display:flex;"><a href="edit/' . $id . '" data-id="' . $id . '" class="btn btn-xs btn-info btnEdit_dataset"> Edit</a>  	&nbsp;';

            $action .= '<a href="javascript:void(0);" data-id="' . $id . '" type="button" class="btn btn-xs btn-danger btnDelete_dataset"> Delete</a></div>';





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

