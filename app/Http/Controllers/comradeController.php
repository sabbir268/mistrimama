<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceSystem;
use App\User;
use Auth;
use App\Models\service_providers_comrads as Comrades;
use DB;
use App\OrderDetails;

class comradeController extends Controller
{
    public function index()
    {
        $comrades = User::find(Auth::user()->id)->comrades;
        $allowcatedOrders = $comrades->first()->serviceSystem->where('status', '!=',  '5');
        $activeOrders = $comrades->first()->serviceSystem->where('status', '!=',  '5')->first();
        if($activeOrders){
            //$sumOrder = DB::table('bookings')->select(DB::raw("SUM(quantity) as total_quantity, SUM(total_price) as total_price"))->where('order_id', $activeOrders->order_id)->get();
            $sumOrder = OrderDetails::find($activeOrders->order_id);
        }else{
            $sumOrder = '';
            $allord = '';
            return view('comrade.index', compact('allowcatedOrders','sumOrder','allord'));
        }
         return view('comrade.index', compact('allowcatedOrders','sumOrder'));
    }

    public function jobHistory()
    {
        $comrades = User::find(Auth::user()->id)->comrades;
        $prevOrder = $comrades->first()->serviceSystem->where('status', '=',  '5');
        return view('comrade.job-history', compact('prevOrder'));
    }
}
