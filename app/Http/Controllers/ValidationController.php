<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller {

    public function spfValidation(Request $request) {
        $message = [
            'pickup_location.1.*' => 'The pickup 1 field is required',
            'pickup_location.2.*' => 'The pickup 2 field is required',
            'pickup_location.3.*' => 'The pickup 3 field is required',
            'pickup_distance.1.*' => 'This field is required',
            'pickup_distance.2.*' => 'This field is required',
            'pickup_distance.3.*' => 'This field is required',
        ];







        $rule = [
            "name" => 'required',
            "email" => 'required|email',
            "phone_no"  =>  'required|regex:/^(\+88)?\d{11}$/',
            //"alt_ph"    =>  'nullable|regex:/^(\+88)?\d{11}$/',
            "mfs_account" => 'required|numeric',
            "smart_card" => 'required|numeric',
            "cat" => 'required',
            "l_email" => 'required|email',
            "pwd" => 'required',
            "c_pwd" => 'required',
            "cluster" => 'required',
            "zone" => 'required',
            "c_email.*" => 'required',
            "c_pwd.*" => 'required',
            "c_name.*" => 'required',
            "c_phone_no.*" => 'required',
            "c_alt_phone_no.*" => 'required|regex:/^(\+88)?\d{11}$/',
            
            
           
        ];


        //pr($rule);

        $validator = Validator::make($request->all(), $rule, $message);


        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        } else {
            return response()->json(['response' => 1, 'success' => '']);
        }
    }
    
    
      public function fspValidation(Request $request) {
        $message = [
            'pickup_location.1.*' => 'The pickup 1 field is required',
            
        ];







        $rule = [
            "name" => 'required',
            //"email" => 'required|email',
            "phone_no"  =>  'required|regex:/^(\+88)?\d{11}$/',
            //"alt_ph"    =>  'nullable|regex:/^(\+88)?\d{11}$/',
            "mfs_account" => 'required|numeric',
            "smart_card" => 'required|numeric',
            "cat" => 'required',
            "l_email" => 'required|email',
            "pwd" => 'required',
            "c_pwd" => 'required',
            "cluster" => 'required',
            "zone" => 'required',
           
            
            
           
        ];


        //pr($rule);

        $validator = Validator::make($request->all(), $rule, $message);


        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        } else {
            return response()->json(['response' => 1, 'success' => '']);
        }
    }
    public function bookingLogin(Request $request){
        
        $email = $request->input('username');
        $password = $request->input('password');
        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
          return response()->json([
                'status'=>1,
                'message' => 'Success.'
                ]);
        } else {
            return response()->json([
                'status'=>0,
                'message' => 'Enter valid username and passwords.'
]);
             
        }
    }

}
