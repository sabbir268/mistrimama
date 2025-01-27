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
use App\Http\Controllers\SslCommerzPaymentController;
use App\SMS;

class ServiceSystemController extends Controller
{
    public function statusUpdate(Request $request )
    {
        
        $sts = $request->status;
        $ordId = $request->order_id;
        $sSysId = $request->s_sys_id;
       // return $request->amount;
        if($request->has('order_id')){
            $order = Order::find($ordId);
            $order->status = $sts;
            $orderDetails = OrderDetails::find($ordId);
            if($sts == 3){
                if($order->order_from != 'special' || $order->order_from != 'user' ){
                    $discountAmount = $order->disc != 0.00 ? (($orderDetails->total_price * $order->disc) /100) : 0.00; 
                }else{
                    $discountAmount = promocheck($order->user_id, $orderDetails->total_price);
                }
                $order->disc = $discountAmount;
                
                $msg = "Thank you so much for taking service from Mistri Mama. Your total payable bill amount is BDT ". $order->total_price  ."/-";

                SMS::send($order->phone,$msg);
            }
            $ssysidu = $order->serviceSystem->first()->id;
            if ($ssysidu) {
                $serviceSys = ServiceSystem::find($ssysidu);
                $serviceSys->status = $sts;
                $serviceSys->save();
            }
            
            if($request->has('pay_type')){
                $order->pay_type = $request->pay_type;
                if($request->pay_type == 3){
                    $data['total_amount'] = ($orderDetails->total_price + $orderDetails->extra_charge) - $order->disc; 
                    $data['cus_name'] = $order->user->name; 
                    $data['cus_email'] = $order->user->email == null ? "info@mistrimama.com" : $order->user->email ; 
                    $data['cus_add1'] = $order->user->address; 
                    $data['cus_add2'] = $order->user->area;
                    $data['cus_phone'] = $order->user->phone_no;
                    $data['order_no'] = $order->order_no;
                    $data['order_cat'] = $order->category->name;
                    $data['pay_type'] = $request->pay_type;
                    $order->status = 3;
                   // return SslCommerzPaymentController::index();
                    $order->save();
                  return SslCommerzPaymentController::payment($data);
                }
            }

            $order->save();

        }
        


        if ($request->status == 5) {
            //return $request->amount;
            /** Misatrimama commission deduct */
            $account = new Account();
            $sp = ServiceProvider::find($request->service_provider_id);
            $user = User::find($request->client_id);
            $amount = ($request->amount * $sp->service_category)/100;
            $account->amount = $order->order_from == 'esp' || $order->order_from == 'comrade' ? 0 : $amount;
            $account->user_id = $sp->u_id;
            $account->trxno = generateRandomString(10);
            if($order->pay_type > 1 ){
                $account->type = 'virtual';
            }else{
                $account->type = 'cash';
            }
            
            $account->details = 'Mistri Mama Commission ('.$sp->service_category.'%)';
            $account->ref = $user ? $user->name : 'guest';
            $account->status = 'debit';
            $account->save();

            /** Discounted Price Adjustment */
            if($order->disc != 0.00){
                $account = new Account();
                $account->amount = $order->disc;
                $account->user_id = $sp->u_id;
                $account->trxno = generateRandomString(10);
                $account->type = 'virtual';
                $account->details = 'discount_adjust';
                $account->ref = $user ? $user->name : 'guest';
                $account->status = 'credit';
                $account->save();

                $accountdis = new Account();
                $accountdis->amount = $order->disc;
                $accountdis->user_id = 1;
                $accountdis->trxno = generateRandomString(10);
                $accountdis->type = 'virtual';
                $accountdis->details = 'discount_adjust';
                $accountdis->ref = "SP:". $sp->name;
                $accountdis->status = 'debit';
                $accountdis->save();
            }

            /** Mistrimama own account save */
            $accountmm = new Account();
            $accountmm->amount = $order->order_from == 'esp' || $order->order_from == 'comrade' ? 0 : $amount;
            $accountmm->user_id = 1;
            $accountmm->trxno = generateRandomString(10);
            $accountmm->type = 'virtual';
            $accountmm->details = 'service_comission';
            $accountmm->ref = $sp->u_id;
            $accountmm->status = 'credit';
            $accountmm->save();

            /** Sp Income own account save */
            $accountsp = new Account();
            $accountsp->amount = $order->order_from == 'esp' || $order->order_from == 'comrade' ? $request->amount : $request->amount - $amount;
            $accountsp->user_id = $sp->u_id;
            $accountsp->trxno = generateRandomString(10);
            $accountsp->details = 'Service Payment Recive. Order#'.$order->order_no;
            $accountsp->ref = $user ? $user->name : 'guest';

            if($order->pay_type > 1 ){
                $accountsp->status = 'credit';
                $accountsp->type = 'virtual';
            }else{
                $accountsp->status = 'income';
                $accountsp->type = 'cash';
            }
            
            $accountsp->save();
            
            /** Reward point add to referar */
            if($order->ref_code != null){
                $ruser = User::where('ref_code',$order->ref_code)->first();
                $rp = new RewardPoint();
                $rp->user_id = $ruser->id;
                if(checkRole($ruser->id, 'special')){
                    $rp->rp = (($request->amount * 30)/100);
                }else{
                    $rp->rp = 0;
                }   
                $rp->status = 'add';
                $rp->details = "Service referred (BDT". $request->amount .")";
                $rp->save();
            }
            // RewardPoint

            /** Send notification to kushal boss for MM Ltd only */
            if($sp->id == 2){
                SMS::send('01313476474', 'Order#' . $order->order_no .' is finished successfully. Total amount recived: BDT '.$request->amount.'/-');
            }
            
            
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

