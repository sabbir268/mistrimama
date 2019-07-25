<?php

namespace App\Http\Controllers\Service_provider_comrade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceSystem;
use App\Models\category;
use App\Models\service_providers;
use App\Models\service_providers_comrads;
use App\Users;
use Session;

class ServiceProviderComradController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_id = ServiceSystem::pluck('category_id');

        $categories = category::whereIn('id', $category_id)->get();
        // $user_id = ServiceSystem::pluck('user_id');
        // $service_provider_id = ServiceSystem::pluck('service_provider_id');
        // $users = Users::whereIn('id', $user_id);
        // $service_providers = service_providers::whereIn('id', $service_provider_id);
        return view('comrad.Bookings.index', compact('categories'));
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
        //
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
        //
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

    public function job_done(Request $request)
    {
        $service = category::find($request->input('id'));
        if ($service->job_done) {
            $service->job_done = false;
            $service->save();
            return Session::flash('alert-danger', 'Job Mark as Not Done!');
        } else {
            $service->job_done = true;
            $service->save();
            return Session::flash('alert-success', 'Job Mark as Done!');
        }
    }
}
