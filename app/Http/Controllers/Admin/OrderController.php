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

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('contributor');
    }

    public function index() {

    }

    public function order_list() {
        return view('Admin.order.list');
    }

    public function orders_data_table() {

        $requestData = $_REQUEST;

        $data = array();

        //This is for order 
        $columns = array(
//            0. => 'o.id',
            0 => 'u.name',
            1 => 'r.title',
            2 => 'o.charge_id',
            3 => 'o.amount',
            4 => 'o.created_at'
        );


        $select_query = DB::table('orders as o')
                ->leftJoin('users as u', 'u.id', '=', 'o.user_id')
                ->leftJoin('reports as r', 'r.id', '=', 'o.report_id');
//                ->where('r.status', '!=', -1);

        if (Auth::user()->role_id == CONTRIBUTOR_ROLE) {
            $select_query->where('r.user_id', Auth::user()->id);
        }
        $select_query->select('o.*', 'u.name', 'r.title');
        if (isset($requestData['search']['value']) && $requestData['search']['value'] != '') {
            $select_query->where("u.name", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("r.title", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("o.charge_id", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("o.amount", "like", '%' . $requestData['search']['value'] . '%')
                    ->oRwhere("o.created_at", "like", '%' . $requestData['search']['value'] . '%');
//                    ->oRwhere("r.release_date", "like", '%' . $requestData['search']['value'] . '%');
        }

        if (isset($requestData['order'][0]['column']) && $requestData['order'][0]['column'] != '' && isset($requestData['order'][0]['dir']) && $requestData['order'][0]['dir'] != '') {
            $order_by = $columns[$requestData['order'][0]['column']];
            $select_query->orderBy($order_by, $requestData['order'][0]['dir']);
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
            $temp['title'] = $row->title;
            $temp['charge_id'] = $row->charge_id;
            $temp['amount'] = $row->amount;
            $temp['created_at'] = $row->created_at;
            $id = $row->id;

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
