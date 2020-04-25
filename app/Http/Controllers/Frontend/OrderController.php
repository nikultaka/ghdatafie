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

class OrderController extends Controller {

    public function index() {
        if (isset(Auth::user()->role_id)) {
            $data['title'] = 'Orders';

            CommonHelper::add_breadcrumb("Orders", '');

            return view('Frontend.user_order.orders_list')->with($data);
        } else {
            return Redirect::intended('/home');
        }
    }

    public function orders_data_table() {

        $userId = Auth::id();

        $requestData = $_REQUEST;

        $data = array();

        //This is for order 

        $columns = array(
//            0. => 'o.id',
//            0 => 'u.name',

            0 => 'r.title',
            1 => 'o.charge_id',
            2 => 'o.amount',
            3 => 'o.created_at'
        );





        $select_query = DB::table('orders as o')
                ->select('o.*', 'u.name', 'r.title')
                ->leftJoin('users as u', 'u.id', '=', 'o.user_id')
                ->leftJoin('reports as r', 'r.id', '=', 'o.report_id')
                ->where('o.user_id', $userId);




        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {

            $searchValue = $requestData['search']['value'];

            $select_query->whereRaw("(r.title LIKE '%" . $searchValue . "%' OR "

//                        . "u.name LIKE '%" . $searchValue . "%' OR "
                    . "o.charge_id LIKE '%" . $searchValue . "%' OR "
                    . "o.amount LIKE '%" . $searchValue . "%' OR "
                    . "o.created_at LIKE '%" . $searchValue . "%'"

//                        . "r.release_date LIKE '%" . $searchValue . "%'"
                    . ")");
        }

        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {

            $order_by = $columns[$requestData['order'][0]['column']];

            $dir = $requestData['order'][0]['dir'];

            $select_query->orderBy($order_by, $dir);
        } else {

            $select_query->orderBy("o.created_at", "DESC");
        }



        //This is for count

        $totalData = $select_query->count();



        //This is for pagination

        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {

            $select_query->offset($requestData['start']);

            $select_query->limit($requestData['length']);
        }



        $order_list = $select_query->get();



        foreach ($order_list as $row) {

            $temp['id'] = $row->id;

            $temp['name'] = $row->name;

            $temp['title'] = "<a href='" . url("reports/book/" . $row->report_id) . "' target='_blank'>" . $row->title . "</a>";

            $temp['charge_id'] = $row->charge_id;

            $temp['amount'] = $row->amount;

            $temp['created_at'] = $row->created_at;

            $id = $row->id;



            $action = '<a href="' . url("download/report/" . $row->report_id) . '" type="button" class="btn btn-xs btn-primary">Download</a></div>';



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

    public function booking_view() {
        if (isset(Auth::user()->role_id) && Auth::user()->role_id == CONTRIBUTOR_ROLE) {
            $data['title'] = 'Booking';

            CommonHelper::add_breadcrumb("Booking", '');

            return view('Frontend.user_order.booking_list')->with($data);
        } else {
            return Redirect::intended('/home');
        }
    }
    
    public function booking_data_table() {

        $userId = Auth::id();

        $requestData = $_REQUEST;

        $data = array();

        //This is for order 

        $columns = array(
            0 => 'u.name',
            1 => 'r.title',
            2 => 'o.charge_id',
            3 => 'r.price',
            4 => 'o.created_at'
        );

        $select_query = DB::table('reports as r')
                ->select('r.*', 'u.name', 'o.charge_id', 'o.created_at as ordered_at')
                ->Join('orders as o', 'r.id', '=', 'o.report_id')
                ->leftJoin('users as u', 'u.id', '=', 'o.user_id')
                ->where('r.user_id', $userId);

        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {

            $searchValue = $requestData['search']['value'];

            $select_query->whereRaw("(r.title LIKE '%" . $searchValue . "%' OR "
                    . "u.name LIKE '%" . $searchValue . "%' OR "
                    . "o.charge_id LIKE '%" . $searchValue . "%' OR "
                    . "r.price LIKE '%" . $searchValue . "%' OR "
                    . "o.created_at LIKE '%" . $searchValue . "%'"
//                    . "r.release_date LIKE '%" . $searchValue . "%'"
                    . ")");
        }

        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {

            $order_by = $columns[$requestData['order'][0]['column']];

            $dir = $requestData['order'][0]['dir'];

            $select_query->orderBy($order_by, $dir);
        } else {

            $select_query->orderBy("r.created_at", "DESC");
        }



        //This is for count

        $totalData = $select_query->count();



        //This is for pagination

        if (isset($requestData['start']) && $requestData['start'] != '' && isset($requestData['length']) && $requestData['length'] != '') {

            $select_query->offset($requestData['start']);

            $select_query->limit($requestData['length']);
        }

        $order_list = $select_query->get();

        foreach ($order_list as $row) {

            $temp['id'] = $row->id;

            $temp['name'] = $row->name;

            $temp['title'] = "<a href='" . url("reports/book/" . $row->id) . "' target='_blank'>" . $row->title . "</a>";

            $temp['charge_id'] = $row->charge_id;

            $temp['amount'] = $row->price;

            $temp['created_at'] = $row->ordered_at;

//            $id = $row->id;
//
//            $action = '<a href="' . url("download/report/" . $row->report_id) . '" type="button" class="btn btn-xs btn-primary">Download</a></div>';
//
//            $temp['action'] = $action;

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
