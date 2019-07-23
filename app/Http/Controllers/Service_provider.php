<?php

namespace App\Http\Controllers;

use App\Models\category as Cat;
use App\Models\complains;
use App\Models\sub_category as S_Cat;
use App\User as User;
use App\Models\user_roles as UR;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\service_providers as SP;
use App\Models\service_providers_comrads as SPC;
use App\Models\service_providers_services as SPS;
use App\Models\s_p_service_cat as SPSC;
use App\Models\s_p_service_cluster as SPSCL;
use App\Models\s_p_service_days as SPSD;
use App\Models\s_p_service_division as SPSDiv;
use App\Models\s_p_service_time as SPST;
use App\Models\s_p_service_zone as SPSZ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use DB;
use Session;
use App\SMS;

class Service_provider extends Controller
{




    public function activateaccount($id)
    {
        $user = new User();

        $serviceProvider = SP::find($id);


        $user->name = $serviceProvider->name;
        $user->email = $serviceProvider->email;
        $user->phone_no = $serviceProvider->phone_no;
        $nf = explode(" ", $serviceProvider->name)[0];
        $pass = mt_rand(1000, 9999);
        $user->password = Hash::make($pass);
        $user->ref_code =  explode(" ",$serviceProvider->name)[0].rand(0,9).generateRandomString(3);
        $user->status = '2';
        $user->address = $serviceProvider->mailing_add;
        $user->photo = $serviceProvider->passport;
        $success = $user->save();

        $ur = new UR();
        $ur->user_id = $user->id;
        $ur->roles_id = 3;
        $ur->save();


        $msgText = "Your Service Provider request has been approved, Login to your account. \n Email: " . $serviceProvider->email . "\n Password: " . $pass;

        if ($success) {
            $serviceProvider->u_id = $user->id;
            $serviceProvider->status = 1;
            $serviceProvider->save();
            // $phone = "+88"$user->phone_no;
            SMS::send($user->phone_no, $msgText);

            return redirect()->back()->with('success', 'User Activated ...');
        } else {
            return redirect()->back()->with('danger', 'User Not Activated, Please Try Again...');
        }
    }

    public function deactivateaccount($id)
    {
        $s = SP::find($id);
        $u_id = $s->u_id;
        $u = User::find($u_id);

        //$s->u_id = null;
        $s->status = 0;
        $s->save();

        $success = $u->delete();;
        if ($success) {
            return redirect()->back()->with('success', 'User De-Activated ...');
        } else {
            return redirect()->back()->with('success', 'User Not De-Activated, Please Try Again...');
        }
    }



    public function business($id)
    {
        $p = SP::find($id);
        return view('admin.provider.business', compact('p'));
    }

    public function comrads($id)
    {
        $p = SP::find($id);
        return view('admin.provider.comrads', compact('p'));
    }

    public function p_business()
    {

        if (Auth::user()->hasRole('provider')) {
            $p = SP::find(Auth::user()->sp->id);
        }
        return view('admin.provider.business', compact('p'));
    }

    public function p_comrads()
    {
        // if (Auth::user()->hasRole('provider')) {
        $p = SP::find(Auth::user()->sp->id);
        // }
        return view('admin.provider.comrads', compact('p'));
    }

    public function add_comrads($id)
    {
        $p = SP::find($id);
        return view('admin.provider.add_comrads', compact('p'));
    }

    public function p_add_comrads()
    {
        if (Auth::user()->hasRole('provider')) {
            $p = SP::find(Auth::user()->sp->id);
        }
        return view('admin.provider.add_comrads', compact('p'));
    }

    public function p_service()
    {
        if (Auth::user()->hasRole('provider')) {
            $p = SP::find(Auth::user()->sp->id);
        }
        return view('admin.provider.service', compact('p'));
    }

    public function service($id)
    {
        $p = SP::find($id);
        return view('admin.provider.service', compact('p'));
    }

    public function add_service($id)
    {
        $cat = Cat::all();
        $p = SP::find($id);
        return view('admin.provider.add_service', compact('p', 'cat'));
    }

    public function p_add_service()
    {
        $cat = Cat::all();
        if (Auth::user()->hasRole('provider')) {
            $p = SP::find(Auth::user()->sp->id);
        }
        return view('admin.provider.add_service', compact('p', 'cat'));
    }

    public function category()
    {
        $cat = Cat::all();
        $scat = S_Cat::all();
        return view('admin.cat.category', compact('cat', 'scat'));
    }

    public function addcategory(Request $r)
    {
        $c = new S_Cat();
        $c->c_id = $r->service;
        $c->name = $r->name;
        $c->price = $r->price;
        $success = $c->save();
        if ($success) {
            return redirect()->back()->with('success', 'Category Added ...');
        } else {
            return redirect()->back()->with('success', 'Category Not Added, Please Try Again...');
        }
    }

    public function searchthanazone(Request $request)
    {
        //  $request->id;

        $id = $request->id;
        $echo = '<option selected value="">Select</option>';
        // foreach ($id as $d) {
        $zones = DB::table('zones')->where('clusterid', $id)->get();
        foreach ($zones as $zone) {

            $echo .= '<option value="' . $zone->id . '" selected>' . $zone->name . '</option>';
        }
        // }


        return $echo;
    }

    public function searchtservicecat(Request $request)
    {
        //  $request->id;

        $id = $request->id;
        $echo = "";
        //$cat = \App\ServiceCategory::where('id', $id)->with('subCategory')->pluck('name');
        $arr  = array();
        foreach ($id as $d) {
            $cat = DB::table('sub_categories')->where('c_id', $d)->get();
            foreach ($cat as $v) {
                array_push($arr, $v);
            }
        }


        return $arr;
    }

    public function searchtservicecat_old_hasib(Request $request)
    {
        //  $request->id;

        $id = $request->id;
        $echo = "";
        $cat = Cat::whereIn('id', $id)->get();
        //  return $cat;
        foreach ($cat as $cat) {
            $echo .= '<optgroup label="' . $cat->name . '">';
            foreach ($cat->subcat as $c) {
                $echo .= '<option value="' . $c->id . '" selected>' . $c->name . '</option>';
            }
            $echo .= '<optgroup />';
        }


        return $echo;
    }

    public function spf()
    {
        $clusters = DB::table('cluster')->get();
        $cat = Cat::all();
        //$models = \App\ServiceCategory::with('subCategory')->get();
        return view('layouts.service_provider', compact('clusters', 'cat'));
    }

    public function adminSpf()
    {
        $clusters = DB::table('cluster')->get();
        $cat = Cat::all();
        //$models = \App\ServiceCategory::with('subCategory')->get();
        return view('admin.spf.spf', compact('clusters', 'cat'));
    }
    public function spfConfirm()
    {
        return view('layouts.serviceProviderConfirm');
    }

    public function fsp()
    {
        $clusters = DB::table('cluster')->get();
        $cat = Cat::all();
        $models = \App\ServiceCategory::with('subCategory')->get();


        return view('web.signup.fsp', compact('clusters', 'cat'));
    }
    public function mmt()
    {
        $clusters = DB::table('cluster')->get();
        $cat = Cat::all();
        $models = \App\ServiceCategory::with('subCategory')->get();


        return view('web.signup.mmt', compact('clusters', 'cat'));
    }

    public function add_esp(Request $r)
    {
        $validatedData = $r->validate([
            // 'phone_no' => 'required|unique:users,phone_no'
        ]);
        
        try {
            // $username = $r->input('login_email');
            // $password = $r->input('login_password');
            // $confirm_pwd = $r->input('login_confirm_password');


            // TODO: one column is missing in the table
            $service_category = $r->service_category;
            $fullname = $r->input('fullname');
            $phone_no = $r->input('phone');
            $alt_ph = $r->input('alt-phone');
            $email = $r->input('email');
            $mailing_add = $r->input('mailing_address');
            $smart_card = $r->input('nid_number');
            $nic_front = $r->file('front_id');
            $nic_back = $r->file('nid_back');
            $passport = $r->file('photograph');
            $tin_cer = $r->file('tin');
            // $mobile_banking = $r->input('payment');
            $mfs_account = $r->input('account_number');
            $type = $r->input('type');

            if ($r->hasFile('front_id')) {
                $nic_front->getClientOriginalName();
                $nic_front->move('uploads/SP', $nic_front->getClientOriginalName());
            }

            if ($r->hasFile('nid_back')) {
                $nic_back->getClientOriginalName();
                $nic_back->move('uploads/SP', $nic_back->getClientOriginalName());
            }

            if ($r->hasFile('photograph')) {
                $passport->getClientOriginalName();
                $passport->move('uploads/SP', $passport->getClientOriginalName());
            }

            if ($r->hasFile('tin')) {
                $tin_cer->getClientOriginalName();
                $tin_cer->move('uploads/SP', $tin_cer->getClientOriginalName());
            }

            $sp = new SP();

            $sp->name = $fullname;
            if ($type == 'ESP') {
                $sp->type = 0;
            } elseif ($type == 'FSP') {
                $sp->type = 1;
            } elseif ($type == 'MMT') {
                $sp->type = 2;
            }

            $sp->phone_no = $phone_no;
            $sp->alt_ph = $alt_ph;
            $sp->email = $email;
            $sp->mailing_add = $mailing_add;
            $sp->smart_card = $smart_card;
            $sp->service_category = $service_category;
            $sp->nic_front = url('/')."/uploads/SP/".$nic_front->getClientOriginalName();
            $sp->nic_back = url('/')."/uploads/SP/".$nic_back->getClientOriginalName();
            $sp->passport = url('/')."/uploads/SP/".$passport->getClientOriginalName();
            $sp->tin_cer = url('/')."/uploads/SP/".$tin_cer->getClientOriginalName();
            // $sp->mobile_banking = $mobile_banking;
            $sp->mfs_account = $mfs_account;
            // $sp->u_id = $user->id;
            $sp->save();

            // $commision = $r->commision;
            $service_type = $r->service_type;

            if (!empty($service_type)) {
                $spsc = new SPSC();
                $spsc->cats =  $service_type;
                $spsc->s_id = $sp->id;
                $spsc->save();
            }


            // !NO NEED 
            // $table_checkbox = $r->table_checkbox;
            // for ($t = 0; $t < sizeof($table_checkbox); $t++) {
            //     $sps = new SPS();
            //     //checkbox
            //     $sub_cate_id = $table_checkbox[$t];
            //     $sub_cate_id = (int)$sub_cate_id;

            //     //Service Price
            //     $name = $r->name[$t];
            //     $sps->s_price = $name;
            //     //service amount
            //     $sa = $r->sp[$t];
            //     $sps->s_desp = $sa;
            //     //MM Commission
            //     $commission = $r->commission[$t];
            //     $sps->s_comm = $commission;
            //     $sps->s_id = $sp->id;
            //     $sps->sc_id = $spsc->id;
            //     $sps->ssc_id = $sub_cate_id;
            //     $sps->save();
            // }
            // !NO NEED 

            $cluster = $r->cluster;

            if (!empty($cluster)) {
                $spscl = new SPSCL();

                $spscl->cluster = $cluster;
                $spscl->s_id = $sp->id;

                $spscl->save();
            }



            $zone = $r->zone;

            if (!empty($zone)) {
                $spsz = new SPSZ();

                $spsz->zone = $zone;
                $spsz->s_id = $sp->id;

                $spsz->save();
            }


            $days = $r->days;

            for ($d = 0; $d < sizeof($days); $d++) {
                $spsd = new SPSD();
                $spst = new SPST();

                $day = $r->days[$d];
                $spsd->days = $day;
                $spsd->s_id = $sp->id;

                $start_time = $r->start_time[$d];
                $end_time = $r->end_time[$d];

                $spst->time = $start_time;
                $spst->end_time = $end_time;
                $spst->s_id = $sp->id;
                $spsd->save();
                $d_id = $spsd->id;
                $spst->d_id = $d_id;
                $spst->save();
            }


            Session::flash('message', 'Your Service Provider Request is under review. We send you SMS confirmation.
            .Be Patient.!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('message', 'Oops something went wrong try again !');
            Session::flash('alert-class', 'alert-danger');
            return back()->withInput();
        }
    }

    public function add_fsp(Request $r)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $r->name;
            $user->email = $r->l_email;
            $user->password = Hash::make($r->pwd);
            $user->status = '2';

            $user->save();
            $ur = new UR();
            $ur->user_id = $user->id;
            $ur->roles_id = 3;
            $ur->save();
            //return "asdf";

            $destinationPath = 'uploads/SP/';
            $sp = new SP();
            $sp->u_id = $user->id;
            $sp->name = $r->name;
            $sp->type = 1;
            $sp->phone_no = $r->phone_no;
            $sp->alt_ph = $r->alt_ph;
            $sp->email = $r->email;
            $sp->mailing_add = $r->mailing_add;
            $sp->smart_card = $r->smart_card;

            if ($r->hasFile('nic_front')) {
                $nic_front = $r->file('nic_front');
                $extension = $nic_front->getClientOriginalExtension();
                $fileNamenf = time() . '_1.' . $extension;
                $nic_front = $nic_front->move($destinationPath, $fileNamenf);
                $sp->nic_front = $fileNamenf;
            }
            if ($r->hasFile('nic_back')) {
                $nic_back = $r->file('nic_back');
                $extension = $nic_back->getClientOriginalExtension();
                $fileNamenb = time() . '_2.' . $extension;
                $nic_back = $nic_back->move($destinationPath, $fileNamenb);
                $sp->nic_back = $fileNamenb;
            }
            if ($r->hasFile('passport')) {
                $passport = $r->file('passport');
                $extension = $passport->getClientOriginalExtension();
                $fileNamenp = time() . '_3.' . $extension;
                $passport = $passport->move($destinationPath, $fileNamenp);
                $sp->passport = $fileNamenp;
            }
            if ($r->hasFile('tin_cer')) {
                $tin_cer = $r->file('tin_cer');
                $extension = $tin_cer->getClientOriginalExtension();
                $fileNametc = time() . '_4.' . $extension;
                $tin_cer = $tin_cer->move($destinationPath, $fileNametc);
                $sp->tin_cer = $fileNametc;
            }




            $sp->mobile_banking = $r->mobile_banking;
            $sp->mfs_account = $r->mfs_account;
            $sp->mfs_spname = $r->mfs_spname;
            $sp->cat = $r->cat;
            $sp->save();


            $nidf = $r->file('c_nid');
            $c_passportf = $r->file('c_passport');

            $sps = new SPS();

            $sps->s_id = $sp->id;

            for ($i = 0; $i < count($r->sc_id); $i++) {

                $sps->sc_id = $r->sc_id[$i];
                $sps->s_price = $r->s_price[$i];
                $sps->s_comm = $r->s_comm[$i];
                $sps->s_desp = $r->s_desp[$i];
                $sps->save();
            }

            for ($i = 0; $i < count($r->s_category); $i++) {
                $sub_categoryId = $r->s_category[$i];
                $subCategoryModel  = \App\Models\sub_category::where('id', $sub_categoryId)->first();
                if ($subCategoryModel) {
                    $sps = new SPS();
                    $sps->s_id = $sp->id;
                    $sps->sc_id = $subCategoryModel->id;
                    $sps->s_price = $r->s_price[$i];
                    $sps->s_comm = $r->s_comm[$i];
                    $sps->s_desp = $r->s_desp[$i];
                    $sps->save();
                }
            }

            if ($r->has('friday')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Friday';
                $spsd->save();
                // for($i=0;$i<count($r->ftime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->friday_stime;
                $spst->end_time = $r->friday_etime;
                $spst->save();
                // }
            }
            if ($r->has('sat')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Saturday';
                $spsd->save();
                //for($i=0;$i<count($r->stime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->saturday_stime;
                $spst->end_time = $r->saturday_etime;
                $spst->save();
                // }
            }
            if ($r->has('sunday')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Sunday';
                $spsd->save();
                //  for($i=0;$i<count($r->sutime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->sunday_stime;
                $spst->end_time = $r->sunday_etime;
                $spst->save();
                // }
            }
            if ($r->has('mon')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Monday';
                $spsd->save();
                // for($i=0;$i<count($r->mtime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->monday_stime;
                $spst->end_time = $r->monday_etime;
                $spst->save();
                // }
            }
            if ($r->has('tues')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Tuesday';
                $spsd->save();
                // for($i=0;$i<count($r->ttime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->tuseday_stime;
                $spst->end_time = $r->tuseday_etime;
                $spst->save();
                // }
            }
            if ($r->has('wed')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Wednesday';
                $spsd->save();
                //for($i=0;$i<count($r->wtime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->wednesday_stime;
                $spst->end_time = $r->wednesday_etime;
                $spst->save();
                //}
            }
            if ($r->has('thur')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Thursday';
                $spsd->save();
                //  for($i=0;$i<count($r->thutime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->thursday_stime;
                $spst->end_time = $r->thursday_etime;
                $spst->save();
                //  }
            }

            for ($i = 0; $i < count($r->division); $i++) {
                $spsdiv = new SPSDiv();

                $spsdiv->s_id = $sp->id;
                $spsdiv->division = $r->division[$i];
                $spsdiv->save();
            }

            for ($i = 0; $i < count($r->zone); $i++) {
                $spsz = new SPSZ();

                $spsz->s_id = $sp->id;
                $spsz->zone = $r->zone[$i];
                $spsz->save();
            }

            for ($i = 0; $i < count($r->cluster); $i++) {
                $spscl = new SPSCL();

                $spscl->s_id = $sp->id;
                $spscl->cluster = $r->cluster[$i];
                $spscl->save();
            }

            for ($i = 0; $i < count($r->cats); $i++) {
                $spsc = new SPSC();

                $spsc->s_id = $sp->id;
                $spsc->cats = $r->cats[$i];
                $spsc->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Your Request has been Sumbitted, wait for Apporval, You can now login to system ');
        } catch (Exception $e) {
            DB::rollBack();

            $r->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back()->withInput();
        }
    }



    public function add_mmt(Request $r)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $r->name;
            $user->email = $r->l_email;
            $user->password = Hash::make($r->pwd);
            $user->status = '2';

            $user->save();
            $ur = new UR();
            $ur->user_id = $user->id;
            $ur->roles_id = 4;
            $ur->save();
            //return "asdf";

            $destinationPath = 'uploads/SP/';
            $sp = new SP();
            $sp->u_id = $user->id;
            $sp->name = $r->name;
            $sp->type = 4;    // For MMT
            $sp->phone_no = $r->phone_no;
            $sp->alt_ph = $r->alt_ph;
            $sp->email = $r->email;
            $sp->mailing_add = $r->mailing_add;
            $sp->smart_card = $r->smart_card;

            if ($r->hasFile('nic_front')) {
                $nic_front = $r->file('nic_front');
                $extension = $nic_front->getClientOriginalExtension();
                $fileNamenf = time() . '_1.' . $extension;
                $nic_front = $nic_front->move($destinationPath, $fileNamenf);
                $sp->nic_front = $fileNamenf;
            }
            if ($r->hasFile('nic_back')) {
                $nic_back = $r->file('nic_back');
                $extension = $nic_back->getClientOriginalExtension();
                $fileNamenb = time() . '_2.' . $extension;
                $nic_back = $nic_back->move($destinationPath, $fileNamenb);
                $sp->nic_back = $fileNamenb;
            }
            if ($r->hasFile('passport')) {
                $passport = $r->file('passport');
                $extension = $passport->getClientOriginalExtension();
                $fileNamenp = time() . '_3.' . $extension;
                $passport = $passport->move($destinationPath, $fileNamenp);
                $sp->passport = $fileNamenp;
            }
            if ($r->hasFile('tin_cer')) {
                $tin_cer = $r->file('tin_cer');
                $extension = $tin_cer->getClientOriginalExtension();
                $fileNametc = time() . '_4.' . $extension;
                $tin_cer = $tin_cer->move($destinationPath, $fileNametc);
                $sp->tin_cer = $fileNametc;
            }




            $sp->mobile_banking = $r->mobile_banking;
            $sp->mfs_account = $r->mfs_account;
            $sp->mfs_spname = $r->mfs_spname;
            $sp->cat = $r->cat;
            $sp->save();


            $nidf = $r->file('c_nid');
            $c_passportf = $r->file('c_passport');



            if ($r->s_category) {
                for ($i = 0; $i < count($r->s_category); $i++) {
                    $sub_categoryId = $r->s_category[$i];
                    $subCategoryModel  = \App\Models\sub_category::where('id', $sub_categoryId)->first();
                    if ($subCategoryModel) {
                        $sps = new SPS();
                        $sps->s_id = $sp->id;
                        $sps->sc_id = $subCategoryModel->id;
                        $sps->s_price = $r->s_price[$i];
                        $sps->s_comm = $r->s_comm[$i];
                        $sps->s_desp = $r->s_desp[$i];
                        $sps->save();
                    }
                }
            }

            if ($r->has('friday')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Friday';
                $spsd->save();
                // for($i=0;$i<count($r->ftime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->friday_stime;
                $spst->end_time = $r->friday_etime;
                $spst->save();
                // }
            }
            if ($r->has('sat')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Saturday';
                $spsd->save();
                //for($i=0;$i<count($r->stime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->saturday_stime;
                $spst->end_time = $r->saturday_etime;
                $spst->save();
                // }
            }
            if ($r->has('sunday')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Sunday';
                $spsd->save();
                //  for($i=0;$i<count($r->sutime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->sunday_stime;
                $spst->end_time = $r->sunday_etime;
                $spst->save();
                // }
            }
            if ($r->has('mon')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Monday';
                $spsd->save();
                // for($i=0;$i<count($r->mtime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->monday_stime;
                $spst->end_time = $r->monday_etime;
                $spst->save();
                // }
            }
            if ($r->has('tues')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Tuesday';
                $spsd->save();
                // for($i=0;$i<count($r->ttime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->tuseday_stime;
                $spst->end_time = $r->tuseday_etime;
                $spst->save();
                // }
            }
            if ($r->has('wed')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Wednesday';
                $spsd->save();
                //for($i=0;$i<count($r->wtime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->wednesday_stime;
                $spst->end_time = $r->wednesday_etime;
                $spst->save();
                //}
            }
            if ($r->has('thur')) {
                $spsd = new SPSD();
                $spsd->s_id = $sp->id;
                $spsd->days = 'Thursday';
                $spsd->save();
                //  for($i=0;$i<count($r->thutime);$i++) {
                $spst = new SPST();

                $spst->s_id = $sp->id;
                $spst->d_id = $spsd->id;
                $spst->time = $r->thursday_stime;
                $spst->end_time = $r->thursday_etime;
                $spst->save();
                //  }
            }

            for ($i = 0; $i < count($r->division); $i++) {
                $spsdiv = new SPSDiv();

                $spsdiv->s_id = $sp->id;
                $spsdiv->division = $r->division[$i];
                $spsdiv->save();
            }

            for ($i = 0; $i < count($r->zone); $i++) {
                $spsz = new SPSZ();

                $spsz->s_id = $sp->id;
                $spsz->zone = $r->zone[$i];
                $spsz->save();
            }

            for ($i = 0; $i < count($r->cluster); $i++) {
                $spscl = new SPSCL();

                $spscl->s_id = $sp->id;
                $spscl->cluster = $r->cluster[$i];
                $spscl->save();
            }

            for ($i = 0; $i < count($r->cats); $i++) {
                $spsc = new SPSC();

                $spsc->s_id = $sp->id;
                $spsc->cats = $r->cats[$i];
                $spsc->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Your Request has been Sumbitted, wait for Apporval, You can now login to system ...');
        } catch (Exception $e) {
            DB::rollBack();

            $r->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back()->withInput();
        }
    }
}
