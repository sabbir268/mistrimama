<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\s_p_service_cluster as SPSCL;
use App\become_partner;
use Mail;
use DB;

class WebController extends Controller
{



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

    public function getHome()
    {
        $page_title = "Home Page";
        $serviceCategory = \App\ServiceCategory::orderBy('position_no')->get();
        
        $model = getPageData(1);
        
        $services_category = DB::select("SELECT * FROM categories ORDER BY position_no ASC");
        // print_r($services_category); exit;

        // to show service for become partner
        $services_become_partber = DB::select("SELECT categories.id,categories.name FROM categories ORDER BY position_no ASC");
        // print_r($services_become_partber); exit;

        $slider = DB::select("SELECT * FROM sliders WHERE sliders.type='small'");
        // print_r($slider); exit;
        // return view('layouts.newfrontend', compact('serviceCategory','model','page_title','slider','services_become_partber','services_category'));
        return view('new_template.new_template', compact('serviceCategory', 'model', 'page_title', 'slider', 'services_become_partber', 'services_category'));
    }

    public function refer(){
        // $model = DB::SELECT("SELECT * FROM pages WHERE pages.url='Earn-Money'")[0];
        // return view('new_template.earnMoney',compact('model'));
         return view('new_template.refer');
    }

    ////////////////////////////////////services///////////////////////////

    public function generator()
    {
        $model = DB::select("SELECT * FROM categories WHERE categories.slug='generator'");
        // return view('web.services.generator',compact('model'));
        return view('new_template.services.generator', compact('model'));
    }

    public function plumbing()
    {
        $model = DB::select("SELECT * FROM categories WHERE categories.slug='plumbing'");
        // return view('web.services.plumbing',compact('model'));
        return view('new_template.services.plumbing', compact('model'));
    }

    public function electrical()
    {
        $model = DB::select("SELECT * FROM categories WHERE categories.slug='electrical'");
        // return view('web.services.electrical', compact('model'));
        return view('new_template.services.electrical', compact('model'));
    }

    public function ict()
    {

        $model = DB::select("SELECT * FROM categories WHERE categories.slug='ict'");
        // return view('web.services.ict',compact('model'));
        return view('new_template.services.ict', compact('model'));
    }

    public function cctv()
    {
        $model = DB::select("SELECT * FROM categories WHERE categories.slug='cctv'");
        // return view('web.services.cctv',compact('model'));
        return view('new_template.services.cctv', compact('model'));
    }

    public function airConditional()
    {
        $model = DB::select("SELECT * FROM categories WHERE categories.slug='ac'");
        //return view('web.services.airConditional',compact('model'));
        return view('new_template.services.airConditional', compact('model'));

    }

    ////////////////////////////////////company///////////////////////////

    public function services(){
        $model = getPageData(1);
        $services_category = DB::select("SELECT * FROM categories ORDER BY position_no ASC");
        
        return view('new_template.services', compact('model','services_category'));
    }

    public function about()
    {
        $model = getPageData(8);
        // return view('web.company.aboutus',compact('model'));
        return view('new_template.aboutus', compact('model'));
    }



    public function career()
    {
        $model = getPageData(7);
        return view('new_template.career', compact('model'));
    }

    // public function booking()
    // {
    //     $Sub_categories = DB::select("SELECT * FROM sub_categories");
    //     return view('web/booking/bookingfrm', compact('Sub_categories'));
    // }


    public function communityGuidelines()
    {
        $model = getPageData(4);
        // return view('web.company.community', compact('model'));
        return view('new_template.community', compact('model'));
    }

    public function terms()
    {
        $terms = getPageData(2);
        // return view('web.company.terms', compact('terms'));
        return view('new_template.terms', compact('terms'));
    }

    public function contact()
    {
        // return view('web.company.contact');
        return view('new_template.contact');
    }

    public function privacy()
    {
        $model = getPageData(3);
        // return view('web.company.privacy', compact('model'));
        return view('new_template.privacy', compact('model'));
    }

    ////////////////////////////////////discover///////////////////////////
    public function howItWorks()
    {
        $model = getPageData(6);
        return view('new_template.how-it-works', compact('model'));
    }

    public function earnMoney()
    {
        $model = getPageData(5);
        return view('new_template.earnMoney', compact('model'));
    }

    public function faq()
    {


        $models = \App\Faq::get();
        return view('new_template.faq', compact('models'));
    }

    public function blog()
    {
        $models = \App\Blogs::get();
        $blogCategories = DB::select("SELECT blog_category.id,blog_category.title FROM blog_category");
        return view('new_template.blog', compact('models', 'blogCategories'));
    }

    public function showOneBlog($id)
    {
        $models = DB::select("SELECT * FROM blogs WHERE blogs.id='$id'");
        return view('web.discover.blogOne', compact('models'));
    }

    public function showBlogByCategor($id)
    {
        $models = DB::select("SELECT blogs.*,blog_category.id as blogCatId FROM blogs,blog_category WHERE blogs.category_id=blog_category.id AND blog_category.id='$id'");
        return view('web.discover.showBlogByCategory', compact('models'));
    }


    public function shohokari()
    {
        return view('discover.shohokari');
    }

    public function serviceprovider()
    {
        $data['page_title'] = "Service Provider";

        return view('home.index', $data);
    }

    public function contactus(Request $request)
    {

        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required'
            ];
            $this->validate($request, $rules);

            $contact_email = getConfigValue('contact_email');

            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->email,
                'text' => $request->message
            ], function ($message) use ($contact_email) {
                $message->to($contact_email, config('app.name', 'Laravel'))
                    ->subject("Message From contact form")
                    ->from(env('FROM_EMAIL'), env('FROM_NAME'));
            });


            //Mail To Users




            $request->session()->flash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');


            return redirect(url('/contact'));
        }
    }


    function becomePartner(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required'
            ];
            $this->validate($request, $rules);


            $become_partner_store = new become_partner;
            $become_partner_store->name = $request->name;
            $become_partner_store->phone = $request->phone;
            $become_partner_store->email = $request->email;
            $become_partner_store->company = $request->company;
            $become_partner_store->message = $request->message;
            $become_partner_store->service = $request->pservice;
            $become_partner_store->save();
            $getService = $request->pservice;
            $request->session()->flash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            return redirect(url('/'));
        }
    }
}
