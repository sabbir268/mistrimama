<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceSystem;
use Session;
use Validator;
use App\Order;
use App\SMS;
use App\User;
use App\Models\service_providers_comrads as Comrade;

class ServiceAllocatorController extends Controller
{
    public function service_allocate(Request $request)
    {
        $response = array('response' => '', 'success' => false);
        $validator = Validator::make($request->all(), [
            'service_provider_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            /** chek if allocate allready */
            $ssCheck = ServiceSystem::where('order_id', '=', $request->input('order_id'))->first();
            if ($ssCheck) {
                $data = ServiceSystem::find($ssCheck->id);
            } else {
                $data = new ServiceSystem();
            }

            $data->user_id = $request->input('user_id');
            $data->order_id = $request->input('order_id');
            $data->service_provider_id = $request->input('service_provider_id');
            if ($request->has('comrade_id')) {
                $data->service_provider_comrad_id = $request->input('comrade_id');
            }

            $data->status = '1';
            $data->save();

            if ($data->save()) {
                $order = Order::find($request->input('order_id'));
                $order->status = '1';
                $order->save();


                /** for sms only */

                $orderNo = $order->order_no;
                $category = $order->category->name;

                /** get all sub services  */
                $services = $order->bookings;
                $serv = [];
                foreach ($services as $service) {
                    $service_details = $service->service_name . "- " . $service->service_details_name;
                    array_push($serv, $service_details);
                }

                $srv = implode(', ', $serv);

                $strfr = str_replace('["', '', $srv);
                $allServe =  str_replace('"]', '', $strfr);


                //$user = User::find($request->input('user_id'));
                $userName = $order->name;
                $userAddr = $order->address;
                $userPhn = $order->phone;

                if ($request->has('comrade_id')) {

                    $comrade = Comrade::find($request->input('comrade_id'));
                    $ComradeName = $comrade->c_name;
                    $ComradePhone = $comrade->c_phone_no;

                    $msgUsr = "Your order #" . $orderNo . " has been confirmed for." . $allServe . "
                    \nTechnician Details:\n" . $ComradeName . "\nPhone Number: " . $ComradePhone . "";
                    $smsuser = SMS::send($userPhn, $msgUsr);

                    if ($smsuser) {
                        $msgComd = "Order#" . $orderNo . "\n" . $userName . "\n Cell:" . $userPhn . "\n" . $userAddr . ",\n" . $allServe;

                        SMS::send($ComradePhone, $msgComd);
                    }
                }

                /** Send notification to kushal boss for MM Ltd only */
                if ($data->service_provider_id == 2) {
                    SMS::send('01313476474', 'A new order is allowcated to MM Ltd. Order No #' . $order->order_no);
                }

                Session::flash('alert-success', 'Service allocated to Service provider Successfully!');
                return back();
            } else {
                Session::flash('alert-danger', 'Something is wrong!');
            }
        }
    }


    // public function allowcateAdmin(Request $request)
    // { }
}
