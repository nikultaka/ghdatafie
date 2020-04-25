<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Image;
use Mail;
use Session;

class UserController extends Controller {

    public function __construct() {
        
    }

    public function register() {
        if (Auth::check() && Auth::user()->role_id == USER_ROLE || Auth::check() && Auth::user()->role_id == CONTRIBUTOR_ROLE) {
            return redirect('/');
        }
        $user_role = DB::table('user_role')->where('status', 1)->where('role_id', '!=', ADMIN_ROLE)->get();
        
        $data_result['user_role'] = $user_role;

        return view('Frontend.user.register', $data_result);
    }

    public function login() {
        if (Auth::check() && Auth::user()->role_id == USER_ROLE || Auth::check() && Auth::user()->role_id == CONTRIBUTOR_ROLE) {
            return redirect('/');
        }

        $user_role = DB::table('user_role')->where('status', 1)->where('role_id', '!=', ADMIN_ROLE)->get();

        $data_result['user_role'] = $user_role;

        return view('Frontend.user.login', $data_result);
    }

    public function add_user(Request $request) {
        $post = $request->input();
        $data_result = array();
        $data_result['status'] = 0;
        if ($request->hasFile('imgtoupload')) {
            $this->validate($request, [
                'imgtoupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('imgtoupload');
            $filename = basename($image->getClientOriginalName());
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (!file_exists(public_path() . '/upload/image/profile/')) {
                mkdir(public_path() . '/upload/image/profile/', 0777, true);
            }
            if (!file_exists(public_path() . '/upload/image/profile/resize/')) {
                mkdir(public_path() . '/upload/image/profile/resize/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/image/profile/resize/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $input['media_name'] = $destFile;
            $img = Image::make($image->getRealPath())->resize(250, 250);
            $img->save($destinationPath . '/' . $input['media_name']);


            $destinationPath = public_path() . '/upload/image/profile/';

            $destFile = $uniquesavename . '.' . $extension;

            // $upload_success = $image->move(public_path('upload/image'),$imageName);

            if ($image->move($destinationPath, $destFile)) {
                $upload_result = 1;
                $data['profile_pic'] = $destFile;
            }
            // Else, return error 400
            else {
                $result['status'] = 0;
                $result['msg'] = "Image Uploading fail";
            }
        } else {
            $upload_result = 1;
        }
        if ($post && $upload_result = 1) {
            if (isset($post['id'])) {
                $id = $post['id'];
            }
            $data['name'] = isset($post['username']) ? $post['username'] : '';
            $data['email'] = isset($post['email']) ? $post['email'] : '';
            $data['password'] = isset($post['pass']) ? bcrypt($request->input('pass')) : '';
            $data['role_id'] = isset($post['user_type']) ? $request->input('user_type') : '';
            $data['status'] = '1';

            if (isset($post['id']) && $post['id'] != '') {

                $data['updated_at'] = date("Y-m-d h:i:s");

                $returnresult = DB::table('users')
                        ->where('id', $id)
                        ->update($data);

                if ($returnresult) {
                    $result['status'] = 1;
                    $result['msg'] = 'Record updated successfully.!';
                }
            } else {
                $data['created_at'] = date("Y-m-d h:i:s");
                if (DB::table('users')->insert($data)) {
                    $result['status'] = 1;
                    $result['msg'] = "Record add sucessfully..!";
//                    return redirect(url('login'));
                }
            }
        }
        echo json_encode($result);
        exit;
    }

    public function user(Request $request) {
        $result = array();
        $post = $request->input();

        if (!empty($post)) {
            $username = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $username, 'password' => $password, 'role_id' => USER_ROLE, 'status' => 1])) {
                $request->session()->flash('success', 'Login succesfully.');
                return Redirect::to('/');
            } else if ((Auth::attempt(['email' => $username, 'password' => $password, 'role_id' => CONTRIBUTOR_ROLE, 'status' => 1]))) {
                $request->session()->flash('success', 'Login succesfully.');
                return Redirect::to('/');
            } else {
                $request->session()->flash('danger', 'That username/password combo does not exist.');
                return Redirect::to('/login');
            }
        }
    }

    public function check_email(Request $request) {
        $result = array();
        $post = $request->input();


        if (!empty($post)) {
            $email = $request->input('email');

            $user_detail = DB::table('users')
                    ->select('*')
                    ->where('email', $email)
                    ->where('role_id', '!=', '1')
                    ->where('status', '1')
                    ->first();

            if (!empty($user_detail)) {

                $result['status'] = 1;
                $result['msg'] = "This email is already exist.";
            } else {
                $result['status'] = 0;
                $result['msg'] = "Email available.";
            }
        }

        echo json_encode($result);
        exit;
    }

    public function profile() {
        if (Auth::check() && Auth::user()->role_id == USER_ROLE) {
            return view('Frontend.user.profile');
        }
        return redirect('/');
    }

    public function forgot_password_view(){
        if (Auth::check() && Auth::user()->role_id == USER_ROLE || Auth::check() && Auth::user()->role_id == CONTRIBUTOR_ROLE) {
            return redirect('/');
        }
        return view('Frontend.user.forgot_password');
    }

    public function forgot_password(Request $request) {

        $result = array();
        $post = $request->input();

        if (!empty($post)) {
            $user_detail = DB::table('users')
                    ->select('*')
                    ->where('email', $post['email'])
                    ->first();

            if (!empty($user_detail)) {

                $encrypted = Crypt::encryptString($user_detail->id);

                $user_data = array();
                $user_data['email'] = $user_detail->email;
                $user_data['name'] = $user_detail->name;

                $user_data['link'] = url('/resetpassword/' . $encrypted);

                $subject = 'Password reset.';
                $email = $user_detail->email;

                Mail::send('Frontend.EmailTemplate.forgot_password_email', $user_data, function($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                    $message->from(env('MAIL_USERNAME', USER_EMAIL), USER_NAME);
                });

                $result['status'] = 1;
                $result['msg'] = "We send you a link to reset password.";
            } else {
                $result['status'] = 0;
                $result['msg'] = "Email not exist.";
            }
        }

        echo json_encode($result);
        exit;
    }

    public function reset_password($id) {

        if (isset($id) && $id != '') {

//            $decrypted = Crypt::decryptString($id);

            $data['id'] = $id;

            return view('Frontend.user.reset_password')->with($data);
        }
    }

    public function update_new_password(Request $request) {

        $result = array();
        $post = $request->input();

        if (!empty($post)) {


            $id = Crypt::decryptString($post['hdn_id']);

            $data = array('password' => bcrypt($post['pass']));

            $reset_pass = DB::table('users')
                    ->where('id', $id)
                    ->update($data);

            if ($reset_pass) {
                $result['status'] = 1;
                $result['msg'] = "Password changed successfullt click <a href='" . url('/login') . "' style='border-botton: 1px solid;'>here</a> to login.";
            } else {
                $result['status'] = 0;
                $result['msg'] = "Something went wrong.";
            }
        }

        echo json_encode($result);
        exit;
    }

}
