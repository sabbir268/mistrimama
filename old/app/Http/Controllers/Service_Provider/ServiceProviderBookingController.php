<?php

namespace App\Http\Controllers\Service_Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceSystem;
use App\Models\category;
use App\Models\service_providers;
use App\Models\service_providers_comrads;
use Session;

class ServiceProviderBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ServiceSystem::all();
        $category_id = $data->pluck('category_id');
        $categories = category::whereIn('id', $category_id)->get();
        $service_providers_comrads = service_providers_comrads::all();
        return view('service-provider.Bookings.index', compact('categories', 'service_providers_comrads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = new ServiceSystem;
        $service->service_provider_comrad_id = $request->input('service_provider_comrad_id');
        $service->category_id = $request->input('category_id');
        $service->save();
        Session::flash('alert-success', 'Service allocated to Service provider comrad Successfully!');
        return \Redirect::to('service-provider-dashboard/bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
