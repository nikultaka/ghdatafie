<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\SiteSetting as site;
use Image;
use App\Helper\CommonHelper;
use Illuminate\Support\Facades\URL;

class SitesettingController extends Controller {

    public function __construct() {
         $this->middleware('admin');
    }

    public function index() {

        //This is for breadcrumb
        CommonHelper::add_breadcrumb("Setting", URL::to('/admin/setting'));
        //This is for breadcrumb
       $data =  CommonHelper::get_contact_details();
       
//        $result = DB::table('site_setting')->get();
//        foreach ($result as $key => $value) {
//            $data[$value->option_name] = $value->option_value;
//        }
        return view('Admin.setting.setting')->with($data);
    }

    public function save_details(Request $request) {
        $data = array();
        $result_data = array();
        $result_data['status'] = 0;
       

        if ($request->hasFile('contact_image_upload')) {
             $this->validate($request, [
                    'contact_image_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $image = $request->file('contact_image_upload');
            $filename = basename($image->getClientOriginalName());
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (!file_exists(public_path() . '/upload/image/thumbnail/')) {
                mkdir(public_path() . '/upload/image/thumbnail/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/image/thumbnail/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $input['media_name'] = $destFile;
            $img = Image::make($image->getRealPath())->resize(500, 500);
            $img->save($destinationPath . '/' . $input['media_name']);

            if (!file_exists(public_path() . '/upload/image/thumbnail/')) {
                mkdir(public_path() . '/upload/image/thumbnail/', 0777, true);
            }
            $destinationPath = public_path() . '/upload/image/thumbnail/';

            $destFile = $uniquesavename . '.' . $extension;

            // $upload_success = $image->move(public_path('upload/image'),$imageName);

            if ($image->move($destinationPath, $destFile)) {
               $upload_result = 1; 
               $data['fild_value'] = $destFile;
               $result = DB::table('site_setting_option')->where('fild_name','contact_image')->first();
                if(!empty($result)){
                    $data['status'] = 1;
                    $data['updated_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->where('id', $result->id)
                        ->update($data);
                }else{
                    $data['label'] = 'contact image';
                    $data['fild_name'] = 'contact_image';
                    $data['status'] = 1;
                    $data['created_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->insert($data);
                }
              
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
            if(isset($post['contact_name'])){
                $data_name['fild_value'] = $post['contact_name'];
                $result = DB::table('site_setting_option')->where('fild_name','contact_name')->first();
                if(!empty($result)){
                    
                    $data_name['status'] = 1;
                    $data_name['updated_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->where('id', $result->id)
                        ->update($data_name);
                }else{
                    $data_name['label'] = 'contact Name';
                    $data_name['fild_name'] = 'contact_name';
                    $data_name['status'] = 1;
                    $data_name['created_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->insert($data_name);
                }
            }
            if(isset($post['contact_post'])){
                $data_post['fild_value'] = $post['contact_post'];
                $result = DB::table('site_setting_option')->where('fild_name','contact_post')->first();
                if(!empty($result)){
                    
                    $data_post['status'] = 1;
                    $data_post['updated_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->where('id', $result->id)
                        ->update($data_post);
                }else{
                    $data_post['label'] = 'contact post';
                    $data_post['fild_name'] = 'contact_post';
                    $data_post['status'] = 1;
                    $data_post['created_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->insert($data_post);
                }
            }
            if(isset($post['contact_email'])){
                $data_email['fild_value'] = $post['contact_email'];
                $result = DB::table('site_setting_option')->where('fild_name','contact_email')->first();
                if(!empty($result)){
                    
                    $data_email['status'] = 1;
                    $data_email['updated_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->where('id', $result->id)
                        ->update($data_email);
                }else{
                    $data_email['label'] = 'contact email';
                    $data_email['fild_name'] = 'contact_email';
                    $data_email['status'] = 1;
                    $data_email['created_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->insert($data_email);
                }
            }
            if(isset($post['contact_number'])){
                $data_number['fild_value'] = $post['contact_number'];
                $result = DB::table('site_setting_option')->where('fild_name','contact_number')->first();
                if(!empty($result)){
                    $data_number['status'] = 1;
                    $data_number['updated_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->where('id', $result->id)
                        ->update($data_number);
                }else{
                    $data_number['label'] = 'contact number';
                    $data_number['fild_name'] = 'contact_number';
                    $data_number['status'] = 1;
                    $data_number['created_at'] = date("Y-m-d h:i:s");
                    $returnresult = DB::table('site_setting_option')
                        ->insert($data_number);
                }
            }
            $result_data['status']= 1;
            $result_data['msg']= 'Record Updated';
        }
        echo json_encode($result_data);
        exit;
    }

    public function uploadlogo(Request $request) {
        $result = array();
        $result['status'] = 0;
        $site = new site();
        $filename = basename($_FILES['setting_logo_upload']['name']);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if ($file = $request->hasFile('setting_logo_upload')) {

            $file = $request->file('setting_logo_upload');
            $input['setting_logo_upload'] = time() . '.' . $file->getClientOriginalExtension();


            $destinationPath = public_path() . '/thumbnail/';
            $uniquesavename = time() . uniqid(rand());
            $destFile = $uniquesavename . '.' . $extension;
            $img = Image::make($file->getRealPath())->resize(250, 250);
            $img->save($destinationPath . '/' . $input['setting_logo_upload']);


            $destinationPath = public_path() . '/upload/';
            $uniquesavename = time();
            $destFile = $uniquesavename . '.' . $extension;
            if ($file->move($destinationPath, $destFile)) {
                $data = array();
                $data_site_title = $site->get_value_by_option_name('site_logo');
                if (!empty($data_site_title)) {
                    $site->update_value_by_option_name('site_logo', $destFile);
                    $data['status'] = 1;
                    $data['msg'] = "Data Add Successfully..!";
                } else {
                    $data['option_name'] = 'site_logo';
                    $data['option_value'] = $destFile;
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d');
                    $data['updated_at'] = date('Y-m-d');
                    $site->insert_value_site_setting($data);
                }
            }
            $result['status'] = 1;
            $result['data'] = $destFile;
        }
        echo json_encode($result);
    }
    
}
