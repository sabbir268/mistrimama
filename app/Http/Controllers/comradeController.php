<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceSystem;
use App\User;
use Auth;
use App\Models\service_providers_comrads as Comrades;
use App\Models\service_providers as SP;
use App\Models\category as Catagory;
use DB;
use App\OrderDetails;


class comradeController extends Controller
{
    public function index()
    {
        $comrades = User::find(Auth::user()->id)->comrades->first();
       // $allowcatedOrders = $comrades->first()->serviceSystem->where('status', '!=',  '5');
        $allowcatedOrders = OrderDetails::where('sp_comrade_id',$comrades->id)->where('status', '!=',  '5')->where('status', '!=',  'cancel')->get();
      //  return $allowcatedOrders;
        return view('comrade.index', compact('allowcatedOrders', 'sumOrder'));
    }

    public function jobHistory()
    {
        $comrades = User::find(Auth::user()->id)->comrades;
        $prevOrder = $comrades->first()->serviceSystem->where('status', '=',  '5');
        return view('comrade.job-history', compact('prevOrder'));
    }

    public function behalfOrder()
    {
        $comrades = User::find(Auth::user()->id)->comrades->first();
        $providers = SP::find($comrades->s_id);
        $services = $providers->category->pluck('cats')->toArray();
        //return $services;
        $services_category = Catagory::whereIn('id', $services)->get();

        // return $services_category;
        //  $services_category = DB::select("SELECT categories.id,categories.name FROM categories");
        return view('comrade.order.area_cat', compact('services_category'));
    }

    public function faq()
    {
        $faqs = DB::SELECT("SELECT * FROM faqs WHERE type = 4");
        return view('comrade.faq', compact('faqs'));
    }

    public function cancelOrder($id)
    {
        $order = ServiceSystem::where('order_id', $id)->first();
        // $order->delete();
        if ($order->delete()) {
            return back()->with('success', 'অর্ডার বাতিল করা হয়েছে');
        } else {
            return back()->with('danger', 'Something went wrong');
        }
        // $order->service_provider_comrad_id = null;
        // if($order->save()){
        //     return back()->with('success','অর্ডার বাতিল করা হয়েছে');
        // }else{
        //     return back()->with('danger','Something went wrong');
        // }
    }
}
