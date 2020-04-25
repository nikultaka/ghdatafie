<?php



namespace App\Http\Controllers\Frontend;



use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Helper\CommonHelper;



class DatasetController extends Controller {



    public function index(Request $request) {



//        $dataset = DB::table('tbl_dataset')

//                ->select('*')

//                ->where('fld_dataset_status', 1)

//                ->paginate(10);

//

//        $data['datasets'] = $dataset;

//

//        if ($request->ajax()) {

//            return view('Frontend.dataset.full_load')->with($data);

//        }

//

//        return view('Frontend.dataset.full_list')->with($data);

    }



    public function datasetdetails($id = '') {

        

        $data = array();

        $data['title'] = '';

        $count_update = DB::table('tbl_dataset')

                ->where('fld_dataset_id',$id)

                ->increment('popular_count');



        $dataset = DB::table('tbl_dataset')

                ->select('tbl_dataset.*', 'brand.title')

                ->join('brand', 'brand.id', '=', 'tbl_dataset.fld_category_id')

                ->where('fld_dataset_id', $id)

                ->where('fld_dataset_status', 1)

                ->first();

        if(!empty($dataset)){

            $data['datasets'] = $dataset;

            $data['title'] = isset($dataset->fld_dataset_title) ? $dataset->fld_dataset_title : '';



            CommonHelper::add_breadcrumb("Data", url('data'));

            CommonHelper::add_breadcrumb(isset($dataset->title) ? $dataset->title : 'Dataset', url('datasets/' . $dataset->fld_category_id));

            CommonHelper::add_breadcrumb(isset($dataset->fld_dataset_title) ? $dataset->fld_dataset_title : '', '');

        }

        

        return view('Frontend.dataset.index')->with($data);

    }



    public function datasetlist($cat_id = 0, Request $request) {

        

        $count_update = DB::table('brand')

                ->where('id',$cat_id)

                ->increment('popular_count');



        $dataset = DB::table('tbl_dataset')

                ->select('*')

                ->where('fld_category_id', $cat_id)

                ->where('fld_dataset_status', 1)

                ->paginate(10);

//                ->get()->toarray();

        $brand = DB::table('brand')

                ->select('*')

                ->where('id', $cat_id)

                ->first();



        $data['datasets'] = $dataset;

        $data['brand'] = $brand;

        $data['title'] = isset($brand->title) ? $brand->title : 'Dataset';



        CommonHelper::add_breadcrumb("Data", url('data'));

        CommonHelper::add_breadcrumb(isset($brand->title) ? $brand->title : 'Dataset', '');

        if ($request->ajax()) {

            return view('Frontend.dataset.load')->with($data);

        }



        return view('Frontend.dataset.list')->with($data);

    }



    public function search_brand(Request $request) {



        $result = array();

        $result['status'] = 0;



        $post = $request->input();



        if (!empty($post['tags'])) {



            $brand = DB::table('brand')

                    ->select('*')

                    ->where('title', $post['tags'])

                    ->first();



            if (!empty($brand)) {

                $result['status'] = 1;

                $result['msg'] = "Category exist.";

                $result['data'] = $brand;

            } else {

                $result['status'] = 2;

                $result['msg'] = "Not found.";

            }

        }



        echo json_encode($result);

        exit;

    }



}

