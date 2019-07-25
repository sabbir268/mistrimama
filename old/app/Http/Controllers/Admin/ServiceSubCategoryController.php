<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sub_category;
class ServiceSubCategoryController extends Controller
{
    
    public function index(Request $request) {
        $models = sub_category::paginate(50);
        return view('admin.service-sub-category.index', compact('models'));
    }

    public function create(Request $request) {
        $model = \App\ServiceCategory::get()->pluck('name','id');
        return view('admin.service-sub-category.create', compact('model'));
    }

    public function store(Request $request) {
        $this->validate($request, [
        'name' => 'required',
        'description' =>'required',
        ]);
        $data = $request->all();
        sub_category::create($data);
        return redirect()->route('service-sub-category.index')->with('success', 'Created successfully');
    }

    public function show($id) {
        $model = sub_category::find($id);
        return view('admin.service-category.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = sub_category::find($id);
        $category = \App\ServiceCategory::get()->pluck('name','id');
        return view('admin.service-sub-category.edit', compact('model','category'));
    }

    public function update(Request $request, $id) {
         
        $this->validate($request, [
           'name' => 'required',
           'c_id' => 'required',
           'description' =>'required',
        ]);
        $data = $request->all();
        sub_category::find($id)->update($data);
        return redirect()->route('service-sub-category.index')->with('success', 'Updated successfully');
    }

    public function destroy($id) {
 
        $referenzen = sub_category::findOrFail($id);
        $referenzen->forceDelete();
        \Session::flash('success', 'ServiceCategory has been successfully deleted!');
        return redirect()->back();
    }

    public function positionUpdate(Request $request) {
        if ($request->category) {
            foreach ($request->category as $index => $id) {
                $id = (int) $id;
                if ($id != '') {
                    $model = sub_category::find($id);
                    if ($model) {
                        $model->position_no = $index + 1;
                        $model->save();
                    }
                }
            }
            echo json_encode(['status' => true, 'msg' => "Successfully Updated"]);
            die();
        }
    }}
