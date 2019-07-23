<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WithdrawRequest as WR;
use App\RewardPoint;
use App\Account;

class WithdrawRequestController extends Controller
{
    public function withdrawRequest(Request $request)
    {   
        $wr = new WR();
        $wr->user_id = auth()->user()->id;
        $wr->mfs_number =  $request->mfs_number;
        if ($request->has('reward_point')) {
            $wr->amount = ($request->reward_point / 20);
            $wr->details = "Reward Ponit Convert to cash and Withdraw Request";
            $wr->type = "rp";

            $wr->save();

            $rp = new RewardPoint();
            $rp->user_id = auth()->user()->id;
            $rp->rp = $request->reward_point;
            $rp->status = 'remove';
            $rp->details = "Cash Out (RP" . $request->reward_point . ")";
            $rp->save();
        
        }
        if ($request->has('amount')) {
            $wr->amount = $request->amount;
            $wr->details = "SP Cash out request";
            $wr->type =  $request->type;
            $wr->save();
            
            $account = new Account();
            $account->amount = $request->amount;
            $account->user_id = auth()->user()->id;
            $account->trxno = generateRandomString(10);
            $account->type = 'pending';
            $account->details = 'Withdraw Request';
            $account->ref = $wr->id;
            $account->reason = 'pending_cashout';
            $account->status = 'debit';
            $account->save();
        }

        

        return  redirect()->back();
    }


    public function withdrawApprove(Request $request)
    { }
}
