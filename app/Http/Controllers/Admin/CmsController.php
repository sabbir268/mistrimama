<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use Illuminate\Support\Facades\Validator;
use DB;
use Image;
use App\Http\Requests\CmsCreate;
class CmsController extends Controller {

    public function index(Request $request) {
        $models = Cms::paginate(20);
        //$models = Cms::orderBy('id', 'DESC')->paginate(20);
        return view('admin.cms.index', compact('models'));
    }

    public function create() {
            return view('admin.cms.create');
    }
    public function store(CmsCreate $request) {
        
        try {

            $input = $request->all();
            $input['url'] = createUrl($request->title);
            Cms::create($input);
            $request->session()->flash('success', 'Pages  has been successfully added!');

            return redirect(route('cms.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    
    public function show($id) {
        $model = Cms::find($id);
        return view('admin.cms.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Cms::find($id);
        if ($model) {
            $pagesAttribute = \App\CmsAttributes::where('page_id', $model->id)->get();
            return view('admin.cms.edit', compact('model', 'pagesAttribute'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            if ($request->PagesAttribute) {
                $valid = true;
                foreach ($request->PagesAttribute as $attributeData) {
                    $validator = Validator::make($attributeData, ['value' => 'required']);
                    $valid = $validator->passes() && $valid;
                }
                if ($valid) {
                    
                    foreach ($request->PagesAttribute as $i => $item) {
                        $attributeModel = \App\CmsAttributes::find($i);
                        $attributeModel->update($item);
                    }
                }else{
                    $request->session()->flash('error', 'Oops something went wrong try again !');
                    return redirect()->back();
                }
                
            }
            $model = Cms::find($id);
            $input = $request->all();
            $model->update($input);
            DB::commit();
            $request->session()->flash('success', 'CMS has been successfully Updated!');
            return redirect(route('cms.index'));
            
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

}
