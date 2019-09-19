<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\ServiceAllocatorController;

use Illuminate\Http\Request;
use App\Booking;
use App\BookingService;
use Auth;
use DB;
use Session;
use App\Order;
use App\OrderDetails;
use App\User;
use App\Models\roles;
use App\Models\user_roles;
use App\SMS;
use Carbon\Carbon;
use App\Models\sub_category as SubCategory;
use App\Models\category;
use App\SubServiceDetails;
use App\ServiceSystem;


class AdminOrderController extends Controller
{

    public function searchUser($val)
    {
        $results =  User::where('phone_no', 'like', '%' . $val . '%')->orWhere('name', 'like', '%' . $val . '%')->get();

        return $results;
    }

    public function selectedUser($id)
    {
        $results =  User::find($id);
        return $results;
    }

    public function createOrder()
    {
        $category = category::all();
        return view('admin.order.index', compact('category'));
    }

    public function allService($category_id)
    {
        
        $order = new Order();
        $order_no = mt_rand(1, 1000) . substr(time(), -4);
        $order->order_no = $order_no;
        $order->category_id = $category_id;
        $order->type = 'others';
        $order->order_from = 'admin';

        $order->save();
        Session::put('order_id', $order->id);

        $allService = SubCategory::where('c_id', $category_id)->get();
        return $allService;
    }



    public function allServiceBit($service_id)
    {
        //Session::forget('order_id');
        $allServiceBit = SubServiceDetails::where('sub_categories_id', $service_id)->get();
        return $allServiceBit;
    }

    public function addServiceBit(Request $request)
    {
        $booking = new Booking();

        // return $request;

        if ($request->has('order_id')) {
            $order_id = $request->order_id;
        } else {
            $order_id = Session::get('order_id');
        }

        // return $order_id;

        $bookCheck = $booking->where('sub_cat_details_id', $request->id)->where('sub_categories_id', $request->service_id)->where('order_id', $order_id)->count('id');

        if ($bookCheck == true && $bookCheck > 0) {
            return $booking->where('order_id', Session::get('order_id'))->sum('total_price');
        } else {
            $subCat = SubCategory::find($request->service_id);
            $subCatDetails = SubServiceDetails::find($request->id);

            $booking->order_id = $order_id;
            $booking->sub_categories_id = $request->service_id;
            $booking->sub_cat_details_id = $request->id;
            $booking->quantity = $request->qty;
            $booking->service_name = $subCat->name;
            $booking->service_details_name = $subCatDetails->name;
            $booking->price = $subCatDetails->price;
            $booking->aditional_price = $subCatDetails->additional_price;
           /** this is only for inserting total_price , the price will be calculated in mutator  */
            $booking->total_price = 0;
            $booking->status = 0;
            
            if ($booking->save()) {
                $data['unit_remarks'] = SubServiceDetails::find($request->id)->unit_remarks;
                $data['unit_type'] = SubServiceDetails::find($request->id)->unit_type;
                $data['brief'] = SubServiceDetails::find($request->id)->brief;
                $data['total_price'] = Booking::where('order_id', $order_id)->where('sub_categories_id', $request->service_id)->where('sub_cat_details_id', $request->id)->sum('total_price');
                return $data;
            }
        }
    }
}