<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\career;
use App\become_partner;
use DB;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['career_data']=career::all();
       return view('admin/career/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $file1=$request->cv;
       $file1->getClientOriginalName();
       $file1->move('career_uploads',$request->cv->getClientOriginalName());
       $career_store = new career;
       $career_store->name=$request->name;
       $career_store->email=$request->email;
       $career_store->phone_number=$request->phone_number;
       $career_store->year_of_experience=$request->year_of_exp;
       $career_store->salary_expectation=$request->salary_expectation;
       $career_store->link=$request->link;
       $career_store->cv=$request->cv->getClientOriginalName();
       $career_store->save();
       return redirect()->back();

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
    
       //To show become partner table
    public function become_partner_show()
    {
        $data['become_partnerData']=DB::select("SELECT become_partners.*,categories.name as serviceName FROM categories,become_partners WHERE categories.id=become_partners.service");
         return view('admin.career.become_partner',$data);
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
        $become_partners = become_partner::find($id);
        $become_partners->delete();
        return redirect()->back();
    }
}
