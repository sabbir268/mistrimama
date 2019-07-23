<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

use App\SMS;
use DB;
use App\Models\roles;
use App\Models\user_roles;


class AuthController extends Controller
{
    public function doRegister(Request $request)
    {
        // $request->phone_no = "+88".$request['phone_no'];
        $rules = [
            'name' => 'string',
            'phone_no' => 'string|required|unique:users,phone_no',
            'password' => 'string|required',
            'area' => 'string|required'
        ];
        $validator = Validator::make($request->all(), $rules);
        // return dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->to('/register')->withErrors($validator->errors());
        } else {
            $userType = $request->user_type;
            $user = new User($request->except(['reason']));
            // return $user->phone_no = $phone = "+88".$request['phone_no'];
            $user->ref_code =  explode(" ", $request->name)[0] . rand(0, 9) . generateRandomString(3);
            $user->password = Hash::make($request->input('password'));
            if ($user->save()) {
                if ($request->has('reason')) {
                    $roles = new user_roles();
                    $roles->user_id = $user->id;
                    $roles->roles_id = 2;
                    $roles->save();
                }
                return $this->doLogin($request);
            } else {
                $errors = new MessageBag(['errors' => ['Cannot create your account now. Please try later.']]);
                return redirect()->to('/register')->withErrors($errors);
            }
        }
    }

    // protected function attemptLogin(Request $request)
    // {   
    //     //Try with email AND username fields
    //     if (Auth::attempt([
    //         'phone' => $request['username'],
    //         'password' => $request['password']
    //         ],$request->has('remember'))
    //         || Auth::attempt([
    //         'email' => $request['username'],
    //         'password' => $request['password']
    //         ],$request->has('remember'))){
    //             return true;
    //     }
    //     return false;
    // }

    public function doLogin(Request $request)
    {
        $phone = $request['phone_no'];
        $userType = $request->user_type;
        if ($attempt = Auth::attempt(['phone_no' => $phone, 'password' => $request['password']], $request->has('remember'))) {
            if ($request->reason == 'true') {
                return redirect()->route('show.services');
            } else {
                switch ($userType) {
                    case "user":
                        return redirect()->intended(route('dashboard'));
                        break;
                    case "esp":
                        return redirect()->intended(route('esp-dashboard'));
                        break;
                    case "fsp":
                        return redirect()->intended(route('fsp-dashboard'));
                        break;
                    case "comrade":
                        return redirect()->intended(route('comrade-dashboard'));
                        break;
                    default:
                        return redirect()->intended(route('dashboard'));
                }
            }
        } else {
            $errors = new MessageBag(['message' => ['Incorrect username and/or password']]);
            // return redirect()->back();
            switch ($userType) {
                case "user":
                    return redirect()->to('/login')->withErrors($errors);
                    break;
                case "esp":
                    return redirect()->to('/sp')->withErrors($errors);
                    break;
                case "fsp":
                    return redirect()->to('/sp')->withErrors($errors);
                    break;
                case "comrade":
                    return redirect()->to('/sp')->withErrors($errors);
                    break;
                default:
                    return redirect()->intended(route('dashboard'));
            }
        }
    }
}
