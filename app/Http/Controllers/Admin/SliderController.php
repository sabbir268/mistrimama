<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['Sliders']=slider::all();
        return view('admin/slider/slider',$data);
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
         $file1=$request->pictures;
         $file1->getClientOriginalName();
         $file1->move('slider-images',$request->pictures->getClientOriginalName());
         $sliderstore = new slider;
         $sliderstore->title=$request->title;
         $sliderstore->description=$request->description;
         $sliderstore->type =$request->type;
         $sliderstore->picture=$request->pictures->getClientOriginalName();
         $sliderstore->save();
        return redirect('admin/slider/'.$request->type);
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
    public function destroy($id,$type)
    {
        $sliderdelete=slider::find($id);
        $sliderdelete->delete();
        return redirect('admin/slider/'.$type);

    }
}
