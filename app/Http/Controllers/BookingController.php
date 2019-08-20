<?php

namespace App\Http\Controllers;

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
use App\SMS;
use Carbon\Carbon;
use App\Models\sub_category as SubCategory;
use App\Models\category;
use App\SubServiceDetails;
use App\SureCash;
use App\ServiceSystem;


class BookingController extends Controller
{

    /** **************First step**********************  */
    public function createOrder(Request $request, Order $order) // first step
    {
        // validate
        $rules = array(
            // 'area' => ['required'],
            'category' => ['required']
        );
        $validator = \Validator::make($request->all(), $rules);
        // process the validation

        // if the request comes form user dashboard this block will work

        if ($validator->fails()) {
            return redirect()->route('book-self')->withErrors($validator)->withInput();
        } else {
            if (Session::has('order_id')) {
                $order = Order::find(Session::get('order_id'));
            }
            $order_no = mt_rand(1, 1000) . substr(time(), -4);
            $order->order_no = $order_no;

            $order->category_id = $request->category;

            if (auth()->user()) {
                $order->user_id = auth()->user()->id;
            }
            $order->save();
            Session::put('order_id', $order->id);

            if (Auth::check()) {
                return redirect()->route('show.services');
            } else {
                return redirect()->route('show.services');
            }
            // if ($request->page == 'index') {
            //     $order = Order::find($order->id);
            //     $result['subCategories'] = SubCategory::where('c_id', '=', $order->category_id)->get();
            //     $result['serviceName'] = category::find($order->category_id)->name;
            //     return json_encode($result);
            // }

            // if ($request->page == 'index') {
            //     return redirect()->route('book.frot.second');                   
            // }
        }
    }

    public function createOrderGet(Order $order, $category) // first step
    {

        if (Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
        }
        $order_no = mt_rand(1, 1000) . substr(time(), -4);
        $order->order_no = $order_no;

        $order->category_id = $category;

        if (auth()->user()) {
            $order->user_id = auth()->user()->id;
        }
        $order->save();
        Session::put('order_id', $order->id);

        // if (Auth::check()) {
        //     return redirect()->route('show.services');
        // } else {
        return redirect()->route('show.services');
        //  }
    }



    /** ******************Second step************************  */
    // public function ShowSubServicesFront(SubCategory $SubCategory, category $category)
    // {
    //     $order_id = Session::get('order_id');
    //     $order = Order::find($order_id);
    //     $Sub_categories = $SubCategory->where('c_id', '=', $order->category_id)->get();
    //     $ServiceName = $category->find($order->category_id)->name;
    //     return view('new_template.order_second', compact('Sub_categories', 'ServiceName'));
    // }

    public function ShowSubServices(SubCategory $SubCategory, category $category)
    {
        $order_id = Session::get('order_id');
        $order = Order::find($order_id);
        $Sub_categories = $SubCategory->where('c_id', '=', $order->category_id)->get();
        $ServiceName = $category->find($order->category_id)->name;
        // if ($request->page == 'index') {
        //     return redirect()->route('book.frot.second');                   
        // }
        if (Auth::check()) {
            if (auth()->user()->roles->first()->role == 'esp') {
                return view('esp.order.service', compact('Sub_categories', 'ServiceName'));
            } else {
                return view('user.booking.self.service', compact('Sub_categories', 'ServiceName'));
            }
        } else {
            return view('user.booking.self.service', compact('Sub_categories', 'ServiceName'));
        }
    }


    public function AddSubServiceDetails(Request $request, SubServiceDetails $subServiceDetails)
    {
        // $bookCheck = $booking->where('sub_categories_id', $request->id)->where('order_id', Session::get('order_id'))->count('id');
        $SubServicesType = $subServiceDetails->where('sub_categories_id', $request->id)->get();
        $service_id = $request->id;
        return view('user.booking.service-details', compact('SubServicesType', 'service_id'));
    }

    public function AddSubService(Request $request, Booking $booking)
    {
        $bookCheck = $booking->where('sub_cat_details_id', $request->id)->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'))->count('id');

        if ($bookCheck == true && $bookCheck > 0) {
            // $bookCheck = $booking->where('sub_cat_details_id', $request->id)->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'));
            // $bookCheck->delete();
            return $booking->where('order_id', Session::get('order_id'))->sum('total_price');
        } else {
            $subCat = SubCategory::find($request->service_id);
            $subCatDetails = SubServiceDetails::find($request->id);

            $booking->order_id = Session::get('order_id');
            $booking->sub_categories_id = $request->service_id;
            $booking->sub_cat_details_id = $request->id;
            $booking->quantity = $request->qty;
            $booking->service_name = $subCat->name;
            $booking->service_details_name = $subCatDetails->name;
            $booking->price = $subCatDetails->price;
            $booking->aditional_price = $subCatDetails->additional_price;
            // $booking->aditional_price = $subCat->additional_price;
            $booking->total_price = 0;
            $booking->status = 0;
            /** this is only for inserting total_price , the price will be calculated in mutator  */
            if ($booking->save()) {
                $data['unit_remarks'] = SubServiceDetails::find($request->id)->unit_remarks;
                $data['unit_type'] = SubServiceDetails::find($request->id)->unit_type;
                $data['brief'] = SubServiceDetails::find($request->id)->brief;
                $data['total_price'] = Booking::where('order_id', Session::get('order_id'))->where('sub_categories_id', $request->service_id)->where('sub_cat_details_id', $request->id)->sum('total_price');
                return $data;
            }
        }
    }

    public function deleteSubService(Booking $booking, Request $request)
    {
        $bookCheck = $booking->where('sub_cat_details_id', $request->id)->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'));
        if ($bookCheck->delete()) {
            $SubServicesSelected = $booking->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'))->get();
            // return $booking->where('order_id', Session::get('order_id'))->sum('total_price');

            if (count($SubServicesSelected) > 0) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function QtyUpdate(Request $request, Booking $booking)
    {
        $bookData = $booking->where('sub_cat_details_id', $request->id)->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'))->pluck('id');

        $book = Booking::find($bookData[0]);

        $book->quantity = $request->qty;
        $book->total_price = 0;
        /** this is only for inserting total_price , the price will be calculated in mutator  */
        if ($book->save()) {
            $data['unit_point_adtnl'] = SubServiceDetails::find($request->id)->addnl_service_remarks;
            $data['total_price'] = Booking::where('order_id', Session::get('order_id'))->where('sub_categories_id', $request->service_id)->where('sub_cat_details_id', $request->id)->sum('total_price');
            return $data;
        } else {
            return 'false';
        }
    }


    public function SelectedSubService(Request $request, Booking $booking)
    {
        $SubServicesSelected = $booking->where('sub_categories_id', $request->service_id)->where('order_id', Session::get('order_id'))->get();
        $service_id = $request->service_id;
        if (count($SubServicesSelected) > 0) {
            return view('user.booking.service-details-select', compact('SubServicesSelected', 'service_id'));
        } else {
            return 0;
        }
    }

    public function TotalPrice()
    {
        $total_price = Booking::where('order_id', Session::get('order_id'))->sum('total_price');
        return $total_price;
    }

    // public function bookingForOthers($booking, Request $request)
    // {
    //     Session::push('book_type', 'others');
    //     Session::push('others_name', $request->others_name);
    //     Session::push('others_phone', $request->others_phone);

    //     return redirect()->route('others-arae-cat');
    // }



    /** ******************Third step************************  */
    public function ShowDateTime()
    {
        if (Auth::check()) {
            if (auth()->user()->roles->first()->role == 'esp') {
                return view('esp.order.time');
            } elseif (auth()->user()->roles->first()->role == 'comrade') {
                return view('comrade.order.time');
            } else {
                return view('user.booking.self.time');
            }
        } else {
            return view('user.booking.self.time');
        }
    }

    public function AddDateTime(Request $request)
    {
        $order = Order::find(Session::get('order_id'));

        // validate
        $rules = array(
            'order_date' => ['required'],
            'order_time' => ['required']
        );
        $validator = \Validator::make($request->all(), $rules);
        // process the validation
        if ($validator->fails()) {
            return redirect()->route('book-self')->withErrors($validator)->withInput();
        } else {
            $order->order_date = date("Y-m-d", strtotime($request->order_date));

            $order->order_time =  $request->order_time;




            $time = explode(' ', $request->order_time);
            $num = (int) $time[0];
            $met = $time[1];

            if (($num > 8.00 && $met == 'PM') || ($num < 8.00 && $met == 'AM')) {
                $order->extra_charge = 500.00;
                if ($num == 12  && $met == 'PM') {
                    $order->extra_charge = 0;
                }
            } else {
                $order->extra_charge = 0;
                if ($num == 12  && $met == 'PM') {
                    $order->extra_charge = 500.00;
                }
            }

            $order->save();

            return redirect()->route('order.confirm');
        }
    }


    public function OrderConfirm()
    {
        if (Auth::check()) {
            if (auth()->user()->roles->first()->role == 'esp') {
                $providers = User::find(Auth::user()->id)->serviceProvider->first();
                $comrades = $providers->comrads->where('status', 1);
                // return $comrades;
                $order = Order::find(Session::get('order_id'));
                $order_id = $order->id;
                return view('esp.order.confirm', compact('comrades', 'providers', 'order_id'));
            } elseif (auth()->user()->roles->first()->role == 'comrade') {
                $comrades = User::find(Auth::user()->id)->comrades->first();
                $providers = $comrades->serviceProvider;
                //return $providers;
                $order = Order::find(Session::get('order_id'));
                $order_id = $order->id;
                return view('comrade.order.confirm', compact('comrades', 'providers', 'order_id'));
            } else {
                return view('user.booking.confirm');
            }
        } else {
            return view('user.booking.confirm');
        }
    }


    public function OrderConfirmDone(Request $request)
    {

        $user = new User();
        $order = Order::find(Session::get('order_id'));

        if ($request->has('ref_code') && $request->ref_code != '' || $request->ref_code != NULL) {

            $ruser = $user->where('ref_code', $request->ref_code)->first();
            if ($ruser != true) {
                $msg = ['msg' => 'Referral code is invalid!'];
                return redirect()->back()->with($msg);
            }
            if (auth()->user()->id == $ruser->id) {
                $msg = ['msg' => 'Referral code is invalid!'];
                return redirect()->back()->with($msg);
            }
            // $user = User::find(auth()->user()->id);
            $order->ref_code = $request->ref_code;
            // $order->save();
        }

        if ($request->type == 'others') {
            $order->area = $request->area;
            $order->others_name = $request->others_name;
            $order->others_phone = $request->others_phone;
            $order->others_addr = $request->others_addr;
            $order->type = 'others';

            // $order->save();
        } else{
            $order->area = auth()->user()->area;
            $order->type = 'self';
        }



        $order->status = '0';
        if (Auth::check()) {
            $order->user_id = auth()->user()->id;
        }

        $order->save();
        Session::forget('order_id');
        // return $order->area;
        $ServiceAllowcate = new ServiceAllocatorController();
        if (auth()->user()->roles->first()->role == 'esp') {
            $ServiceAllowcate->service_allocate($request);
            return redirect('esp/jobs');
        }elseif( auth()->user()->roles->first()->role == 'comrade'){
            $ServiceAllowcate->service_allocate($request);
            return redirect('/comrade/dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }


    public function CancelOrder(Request $request)
    {
        $order = Order::find($request->id);
        $ServiceSystem = new ServiceSystem();
        // $booking = Booking::where('order_id', $request->id);
        // $booking->delete();
        $ServiceSystem->user_id = auth()->user()->id;
        $ServiceSystem->status = 'cancel';
        $ServiceSystem->order_id = $request->id;
        $ServiceSystem->save();

        $order->status = 'cancel';
        $order->save();
        return redirect()->route('dashboard');
    }

    public function OrderBitFinish($booking_id){
        $booking = Booking::find($booking_id);
        $booking->status = 1;
        if($booking->save()){
            return 1;
        }else{
            return 0;
        }

       // return $booking;
    }
}
