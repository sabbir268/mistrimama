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
            'trxn' => 'required',
            'amount' => 'required'            
        ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $RechargeRequest->mfs = $request->mfs;
            $RechargeRequest->trxn = $request->trxn;
            $RechargeRequest->amount = $request->amount;
            $RechargeRequest->status = 0;
            $RechargeRequest->user_id = auth()->user()->id;

            $RechargeRequest->save();

            return redirect()->back();
        }
    
    }

