<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
#use App\Events;
use App\ViewsDetails;
use Illuminate\Support\Facades\DB;
use App\User;
use App\DrivingRequest;
use App\Vehicles;
use Carbon\Carbon;
use App\DrivingDetails;
use App\Account;

class HomeController extends Controller {

    public function index() {
        $balance = Account::where('user_id', 1)->where('status', 'credit')->sum('amount') - Account::where('user_id', 1)->where('status', 'debit')->sum('amount');
        
        // if(count($balance) == 0){
        //     $balance = 0;
        // }

        $comission = Account::where('user_id', 1)->where('status', 'credit')->where('details','service_comission')->sum('amount');

        $othersincome = Account::where('user_id', 1)->where('status', 'credit')->where('details','!=','service_comission')->sum('amount');

        $totalexpemce = Account::where('user_id', 1)->where('status', 'debit')->sum('amount');

        return view('admin.home.home', compact('balance','comission','othersincome','totalexpemce'));
    }

    public function login() {
        if (Auth::check()) {
            
             if(isset(auth()->user()->roles[0]) && auth()->user()->roles[0]->role == 'admin'){
                return redirect(route('admin'));
            }else{
               return redirect('user/profile');
            }
            
        }
        return view('admin.home.login');
    }

    public function loginCheck(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if(checkRole(auth()->user()->id,'admin')){
                return redirect(route('admin.dashboard'));
            }else if(checkRole(auth()->user()->id,'accountant')){
                   return redirect(route('admin.dashboard'));

                //    return 0;
            }else{
                return 0;
            }
            
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Enter valid username and password.']);
        }
    }

    public function showProfile() {
        $users = User::find(Auth::user()->id);
        if ($users) {

            return view('admin.home.profile', compact('users'));
        } else {
            abort(404, 'Page not found');
        }
    }

    public function editProfile() {
        $users = User::find(Auth::user()->id);
        return view('admin.home.editprofile', compact('users'));
    }
    
    public function registerUsers(){
         $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function updateProfile(Request $request) {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'street' => 'required|min:5|max:255',
            'locality' => 'required|min:1|max:100',
            'town' => 'required|min:1|max:100',
            'postcode' => 'required',
        ]);

        $input = $request->all();
        $model = User::find(Auth::user()->id);
        $model->update($input);
        $request->session()->flash('success', 'Profile has been Successfull update!');
        return redirect(route('profile'));
    }

    public function specialUserADD(){
        return view('admin.special_user.index');
    }

}
