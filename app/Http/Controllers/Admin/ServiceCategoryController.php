<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Clientlogo;
use App\ServiceProvider;
use Auth;
use App\Http\Requests\ServiceCategoryCreate;
use App\Http\Requests\ServiceCategoryUpdate;

class ServiceCategoryController extends Controller {

    public function index(Request $request) {
        $models = ServiceCategory::orderBy('position_no')->paginate(50);
        return view('admin.service-category.index', compact('models'));
    }

    public function create(Request $request) {
        return view('admin.service-category.create', compact('serviceprovider', 'clientlogo'));
    }

    public function store(ServiceCategoryCreate $request) {
        //$this->validate($request, [
        //'wieso_title' => 'required',
        //'logo_image_url' => 'required',
        //'logo_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //]);
        $data = $request->all();

        if ($request->reffer_service_rendered) {
            $data['reffer_service_rendered'] = json_encode($request->reffer_service_rendered);
        }

        if ($request->reffer_applied_technologies) {
            $data['reffer_applied_technologies'] = json_encode($request->reffer_applied_technologies);
        }


        $logoimage = $request->file('service_logo');
        if ($logoimage) {
            $getimageName = time() . 'a_' . $request->service_logo->getClientOriginalExtension();

            $request->service_logo->move(public_path('images/referenzen'), $getimageName);

            $data['service_logo'] = $getimageName;
        }

        $bannerimage = $request->file('banner_bg_image');
        if ($bannerimage) {
            $getimageName = time() . 'b_' . $request->banner_bg_image->getClientOriginalExtension();
            $request->banner_bg_image->move(public_path('images/referenzen'), $getimageName);

            $data['banner_bg_image'] = $getimageName;
        }

        $bunnersubimage = $request->file('banner_sub_image');
        if ($bunnersubimage) {
            $getimageName = time() . 'c_' . $request->banner_sub_image->getClientOriginalExtension();
            $request->banner_sub_image->move(public_path('images/referenzen'), $getimageName);

            $data['banner_sub_image'] = $getimageName;
        }

        $secondsecimage = $request->file('reffer_second_sec_img');
        if ($secondsecimage) {
            $getimageName = time() . 'd_' . $request->reffer_second_sec_img->getClientOriginalExtension();
            $request->reffer_second_sec_img->move(public_path('images/referenzen'), $getimageName);

            $data['reffer_second_sec_img'] = $getimageName;
        }

        $secondbgimg = $request->file('reffer_second_sec_bgimg');
        if ($secondbgimg) {
            $getimageName = time() . 'e_' . $request->reffer_second_sec_bgimg->getClientOriginalExtension();
            $request->reffer_second_sec_bgimg->move(public_path('images/referenzen'), $getimageName);

            $data['reffer_second_sec_bgimg'] = $getimageName;
        }

        $thirdbgimg = $request->file('reffer_third_sec_bgimg');
        if ($thirdbgimg) {
            $getimageName = time() . 'f_' . $request->reffer_third_sec_bgimg->getClientOriginalExtension();
            $request->reffer_third_sec_bgimg->move(public_path('images/referenzen'), $getimageName);

            $data['reffer_third_sec_bgimg'] = $getimageName;
        }

        $fivebgimg = $request->file('reffer_five_sec_bgimg');
        if ($fivebgimg) {
            $getimageName = time() . 'g_' . $request->reffer_five_sec_bgimg->getClientOriginalExtension();
            $request->reffer_five_sec_bgimg->move(public_path('images/referenzen'), $getimageName);

            $data['reffer_five_sec_bgimg'] = $getimageName;
        }

        $clientimg = $request->file('client_img');
        if ($clientimg) {
            $getimageName = time() . '.' . $request->client_img->getClientOriginalExtension();
            $request->client_img->move(public_path('images/referenzen'), $getimageName);

            $data['client_img'] = $getimageName;
        }

        ServiceCategory::create($data);
        return redirect()->route('service-category')->with('success', 'Created successfully');
    }

    public function show($id) {
        $model = ServiceCategory::find($id);
        return view('admin.service-category.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = ServiceCategory::find($id);



        return view('admin.service-category.edit', compact('model'));
    }

    // public function update(Request $request, $id) 
    // {
    //     $this->validate($request, [
    //         'description' => 'required',
    //         'unique_benefits' => 'required',
    //         'service_category' => 'required',
    //     ]);
    //     $data = $request->all();
    //     ServiceCategory::find($id)->update($data);
    //     return redirect()->route('service-category.index')->with('success', 'Updated successfully');
    // }
    
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'description' => 'required',
            'unique_benefits' => 'required',
            'service_category' => 'required',
        ]);
    
         $serviceCategoryStore=ServiceCategory::find($id);
         $serviceCategoryStore->name=$request->name;
         $serviceCategoryStore->main_image=$request->main_image;
         $serviceCategoryStore->icon_image=$request->icon_image;
         $serviceCategoryStore->image_hover=$request->image_hover;
        //  $serviceCategoryStore->slug= $request->slug;
         $serviceCategoryStore->description=$request->description;
         $serviceCategoryStore->unique_benefits=$request->unique_benefits;
         $serviceCategoryStore->service_category=$request->service_category;
         $serviceCategoryStore->update();
        return redirect()->route('service-category.index')->with('success', 'Updated successfully');
    }
    
    
    
    

    public function destroy($id) 
    {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $referenzen = ServiceCategory::findOrFail($id);
        $referenzen->forceDelete();
        \Session::flash('success', 'ServiceCategory has been successfully deleted!');
        return redirect()->back();
    }

    public function positionUpdate(Request $request) {
        if ($request->category) {
            foreach ($request->category as $index => $id) {
                $id = (int) $id;
                if ($id != '') {
                    $model = ServiceCategory::find($id);
                    if ($model) {
                        $model->position_no = $index + 1;
                        $model->save();
                    }
                }
            }
            echo json_encode(['status' => true, 'msg' => "Successfully Updated"]);
            die();
        }
    }

}
