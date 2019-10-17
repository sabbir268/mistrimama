<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Models\service_providers;
use App\Order;
use Carbon\Carbon;
use App\ServiceSystem;
use App\OrderDetails;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $service_providers = service_providers::where('status',1)->get();
        $chkTime = date('Y-m-d H:i:s', (time() - 1200));
        $newOrders = Order::where('status','=','0')->where('created_at', '<', Carbon::now('Asia/Dhaka')->subMinutes(0)->toDateTimeString())->paginate(20);
        $ongoingOrder = ServiceSystem::where('status', '!=', '5')->where('status', '!=', 'cancel')->paginate(20);
        return view('admin.booking.index', compact('newOrders', 'service_providers','ongoingOrder'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        
        return view('admin.booking.show', compact('order'));
    }

    public function jobHistory()
    {
        $orders = OrderDetails::where('status','5')->orderBy('id','desc')->paginate(15);
        return view('admin.booking.history', compact('orders'));
        // return $allorders;
    }
}
