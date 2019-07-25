<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralSetting;
use App\Http\Requests\GeneralSettingUpdate;

class GeneralSettingController extends Controller {
    public function index(Request $request) {

        $query = GeneralSetting::query(); 
        
//        $models = $query->orderBy('id', 'DESC')->paginate(20);
        
        $models = $query->paginate(20);

        return view('admin.general-setting.index', compact('models'));
    }

     

    public function edit($id) {
        $model = GeneralSetting::find($id);
        return view('admin.general-setting.edit', compact('model'));
    }

    public function update(GeneralSettingUpdate $request, $id) {
        try {
            $model = GeneralSetting::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'General Setting has been successfully Updated!');
            return redirect(route('general-setting.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

     
}
