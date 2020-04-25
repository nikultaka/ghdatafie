<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Helper\CommonHelper;

class PricingController extends Controller {

    public function index() {
        $packeges_details = DB::table('packages')->select('*')->where('status', '!=', -1)->get()->toarray();
        $data = CommonHelper::get_contact_details();
        $data['packeges'] = $packeges_details;
        $data['title'] = 'Pricing';
        CommonHelper::add_breadcrumb("Pricing", '');
        return view('Frontend.pricing.index')->with($data);
    }

    public function order($id = '') {
        if ($id != '') {
            $packeges_details = DB::table('packages')->select('*')->where('id', $id)->where('status', '!=', -1)->first();
            if (!empty($packeges_details)) {
                $data['packege'] = $packeges_details;
                $data['title'] = isset($packeges_details->title) ? $packeges_details->title : "";
                CommonHelper::add_breadcrumb("Pricing", url('pricing'));
                CommonHelper::add_breadcrumb(isset($packeges_details->title) ? $packeges_details->title : "", '');
                return view('Frontend.pricing.order')->with($data);
            }
        }
    }

    public function orderadd(Request $request) {
        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;
        if (!empty($post)) {
            $post = $request->input();
            $insert_data['package_name'] = $post['package_name'];
            $insert_data['gender'] = $post['idGender'];
            $insert_data['firstname'] = $post['firstname'];
            $insert_data['lastname'] = $post['lastname'];
            $insert_data['phone_no'] = $post['phonenumbers'];
            $insert_data['email'] = $post['email'];
            $insert_data['status'] = 1;
            $insert_data['created_at'] = date("Y-m-d h:i:s");
            if (DB::table('package_contact')->insert($insert_data)) {
                Mail::send('email.package_contact', $insert_data, function($message) {
                    $message->to(USER_EMAIL)->subject(USER_SUBJECT);
                    $message->from(FROM_EMAIL, USER_NAME);
                });
                $data_result['status'] = 1;
                $data_result['msg'] = "Email Sent.!";
            }
        } echo json_encode($data_result);
        exit;
    }

}
