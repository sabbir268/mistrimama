<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawRequest;
use App\Account;
use App\RechargeRequest;
use Carbon\Carbon;

class AdminRechargeController extends Controller
{
    public function index()
    {
        $requests = RechargeRequest::where('status', '!=,0')->orderBy('id','DESC')->paginate(20);
        return view('admin.recharge.index', compact('requests'));
    }

    public function status(Request $request, RechargeRequest $rechargeRequest, Account $account)
    {

        $rr = $rechargeRequest->find($request->id);
        if ($request->status == 1) {
            $amount = ($rr->amount - ($rr->amount * MfsCharge($rr->mfs) / 100));
            $account->amount =  $amount;
            $account->user_id = $rr->user_id;
            $account->trxno = $rr->trxn;
            $account->type = $rr->mfs;
            $account->details = 'Mistri Mama Account Recharge';
            $account->ref = auth()->user()->name;
            $account->status = 'credit';
            $account->save();

            $rr->status = $request->status;
            $rr->approved_by = auth()->user()->name;
            $rr->approved_time = date("Y-m-d",time());

            $rr->save();

            return redirect()->back()->with('success', 'Recharge Request approved');
        }else{
            return redirect()->back()->with('danger', 'Recharge Request declined');
        }
        
    }


    // public function check(){
    //     return MfsCharge('bkash');
    // }

}
