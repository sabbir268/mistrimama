<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Http\Requests\FaqCreate;
use App\Http\Requests\FaqUpdate;

class FaqController extends Controller {

    public function index(Request $request) {

        $models = Faq::paginate(20);
        return view('admin.faq.index', compact('models'));
    }

    public function create(Request $request) {

        return view('admin.faq.create');
    }

    public function store(FaqCreate $request) {
        try {
            Faq::create($request->all());
            $request->session()->flash('success', 'Faq has been successfully added!');
            // return redirect()->back();
            return redirect(route('faq.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Faq::find($id);
        return view('admin.faq.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Faq::find($id);
        return view('admin.faq.edit', compact('model'));
    }

    public function update(FaqUpdate $request, $id) {
        try {
            $model = Faq::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'FAQ has been successfully Updated!');
            return redirect(route('faq.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $role = Faq::findOrFail($id);
        $role->forceDelete();
        \Session::flash('success', 'FAQ has been successfully deleted!');
        return redirect()->back();
    }

}
