<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\CmsAttributes;
use Image;
use App\Http\Requests\CmsAttributeCreate;
use App\Http\Requests\CmsAttributeUpdate;


class CmsAttributesController extends Controller {

    public function index(Request $request) {
        $models = CmsAttributes::with('pages')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.cms-attribute.index', compact('models'));
    }
    public function create() {
        $allPages = \App\Cms::select('id','title')->get()->pluck('title','id');
        return view('admin.cms-attribute.create', compact('allPages'));
    }

    public function store(CmsAttributeCreate $request) {
        try {

            CmsAttributes::create($request->all());
            $request->session()->flash('success', 'Page Attribute has been successfully added!');

            return redirect(route('cms-attribute.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = CmsAttributes::find($id);
//        return view('admin.cms-attribute.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = CmsAttributes::find($id);

        if ($model) {
            $allPages = \App\Cms::select('id','title')->get()->pluck('title','id');
            return view('admin.cms-attribute.edit', compact('model', 'allPages'));
        } else {
            abort(404);
        }
    }

    public function update(CmsAttributeUpdate $request, $id) {

        try {
            $model = CmsAttributes::find($id);
            $input = $request->all();
            $model->update($input);







            $request->session()->flash('success', 'Pages Attributes has been successfully Updated!');
            return redirect(route('cms-attribute.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }
    public function destroy($id) {
        $role = CmsAttributes::findOrFail($id);
        $role->forceDelete();
        Session::flash('success', 'Pages Attributes has been successfully Deleted!');

        return redirect()->back();
    }
}
