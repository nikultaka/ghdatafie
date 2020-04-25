<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helper\CommonHelper;
use Session;
use Mail;

class PaymentController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('user'); // if you want user to be logged in to use this function then uncomment this code.
    }

    public function handleonlinepay(Request $request) {

        $post = $request->input();

        try {

            $setting = new \App\Helper\CommonHelper;

            $mode = $setting->get_setting_details('stripe_mode', 'fild_value');

            $stripe_secret = $setting->get_setting_details('stripe_secret', 'fild_value');

            \Stripe\Stripe::setApiKey($stripe_secret);

            $charge = \Stripe\Charge::create(array(
                        'source' => $request->stripeToken,
                        'amount' => (int) ($post['amount'] * 100), // the mount will be consider as cent so we need to multiply with 100
                        'currency' => 'USD',
                        'receipt_email' => isset($post['email']) ? $post['email'] : ""
            ));

            $report_id = isset($post['report_id']) ? $post['report_id'] : "";

            $data['user_id'] = Auth::user()->id;
            $data['report_id'] = $report_id;
            $data['charge_id'] = isset($charge->id) ? $charge->id : "";
            $data['card_no'] = isset($charge->source['last4']) ? $charge->source['last4'] : "";
            $data['exp_date'] = $charge->source['exp_month'] . "-" . $charge->source['exp_year'];
            $data['amount'] = isset($post['amount']) ? $post['amount'] : "";
            $data['created_at'] = date("Y-m-d H:i:s");

            DB::table('orders')->insert($data);

            $reports = DB::table('reports')
                    ->select('*')
                    ->where('id', $report_id)
                    ->first();

            if (!empty($reports)) {
                $email_data = array();
                $email_data['amount'] = isset($post['amount']) ? $post['amount'] : "";
                $email_data['title'] = isset($reports->title) ? $reports->title : "";

                $subject = 'Payment Detail.';
                $email = isset($charge->receipt_email) ? $charge->receipt_email : "";

                if($email != ""){
                    Mail::send('Frontend.EmailTemplate.payment_email', $email_data, function($message) use ($email, $subject) {
                        $message->from(env('MAIL_USERNAME', USER_EMAIL), USER_NAME);
                        $message->to($email)->subject($subject);
                    });
                }
            }

            Session::flash('alert-success', 'Charge successful, Thank you for payment!');
            return response()->json([
                        'message' => 'Charge successful, Thank you for payment!',
                        'state' => 'success'
            ]);
        } catch (\Exception $ex) {
            Session::flash('alert-danger', 'There were some issue with the payment. Please try again later.');
            return response()->json([
                        'message' => 'There were some issue with the payment. Please try again later.',
                        'state' => 'error'
            ]);
        }
    }

}
