<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\ServiceSystem;
use App\Account;
use App\RewardPoint;
use App\Models\service_providers as ServiceProvider;
use App\OrderDetails;

class ServiceSystemController extends Controller
{
    public function statusUpdate(Request $request )
    {
        
        $sts = $request->status;
        $ordId = $request->order_id;
        $sSysId = $request->s_sys_id;

        if($request->has('order_id')) {
            $order = Order::find($ordId);
            $order->status = $sts;
            $orderDetails = OrderDetails::find($ordId);
            if($sts == 3){
                $order->disc = promocheck($order->user_id, $orderDetails->total_price);
            }
            $ssysidu = $order->serviceSystem->first()->id;
            if ($ssysidu) {
                $serviceSys = ServiceSystem::find($ssysidu);
                $serviceSys->status = $sts;
                $serviceSys->save();
            }

            $order->save();

        }
        if ($request->status == 5) {
            $account = new Account();
            $sp = ServiceProvider::find($request->service_provider_id);
            $user = User::find($request->client_id);
            $amount = ($request->amount * $sp->service_category)/100;
            $account->amount = $amount;
            $account->user_id = $sp->u_id;
            $account->trxno = generateRandomString(10);
            $account->type = 'cash';
            $account->details = 'Mistri Mama Commission ('.$sp->service_category.'%)';
            $account->ref = $user->name;
            $account->status = 'debit';
            $account->save();

            if($order->disc != 0.00){
                $account = new Account();
                $account->amount = promocheck($order->user_id, $orderDetails->total_price);
                $account->user_id = $sp->u_id;
                $account->trxno = generateRandomString(10);
                $account->type = 'virtual';
                $account->details = 'discount_adjust';
                $account->ref = $user->name;
                $account->status = 'credit';
                $account->save();
            }

            /** Mistrimama own account save */
            $accountmm = new Account();
            $accountmm->amount =  $amount;
            $accountmm->user_id = 1;
            $accountmm->trxno = generateRandomString(10);
            $accountmm->type = 'cash';
            $accountmm->details = 'service_comission';
            $accountmm->ref = $sp->u_id;
            $accountmm->status = 'credit';
            $accountmm->save();

            /** Sp Income own account save */
            $accountsp = new Account();
            $accountsp->amount = $request->amount - $amount;
            $accountsp->user_id = $sp->u_id;
            $accountsp->trxno = generateRandomString(10);
            $accountsp->type = 'cash';
            $accountsp->details = 'Service Payment Recive';
            $accountsp->ref = $user->name;
            $accountsp->status = 'income';
            $accountsp->save();

            if($order->ref_code != null){
                $ruser = User::where('ref_code',$order->ref_code)->first();
                $rp = new RewardPoint();
                $rp->user_id = $ruser->id;
                $rp->rp = ($request->amount / 50);
                $rp->status = 'add';
                $rp->details = "Service referred (BDT". $request->amount .")";
                $rp->save();
            }
            
            // RewardPoint
        }

        if ($request->has('s_sys_id')) {
            $serviceSys = ServiceSystem::find($sSysId);
            $serviceSys->status = $sts;
            $serviceSys->save();
        }

        return back();
    }

    public function checkStatus($order_id)
    {
        $order = Order::find($order_id);
        return $order->status;
    }
}

