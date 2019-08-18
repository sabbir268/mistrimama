<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RechargeRequest;
use Illuminate\Support\Facades\Validator;

class RechargeRequestController extends Controller
{
    public function request(Request $request, RechargeRequest $RechargeRequest){

        $validator = Validator::make($request->all(), [
            'mfs' => 'required',
           //'trxn' => 'required',
            'amount' => 'required'            
        ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $RechargeRequest->mfs = $request->mfs;
           

            if($request->has('deposit_date')){
                if($request->has('mm_trx_no')){
                    $RechargeRequest->trxn = $request->mm_trx_no."/".$request->agent_id;
                }
                $RechargeRequest->trxn = $request->brance_name."/".$request->deposit_date;
            }else{
                $RechargeRequest->trxn = $request->trxn;
            }
            $RechargeRequest->amount = $request->amount;
            $RechargeRequest->status = 0;
            $RechargeRequest->user_id = auth()->user()->id;

           if($RechargeRequest->save()){
           // $request->session()->flash('success', 'Profile has been Successfull update!');
             return redirect()->back()->with('success','Recharge Request submited, wait for conformation!');
           }else{
            return redirect()->back()->with('error','Something went wrong!');
           }

            
        }
    
    }

