<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\service_providers as ServiceProviders;
use DB;
use App\Account;
class ServiceProviderController extends Controller
{

    public function index(Request $request)
    {

        // $query = service_providers::query();
        // if ($request->name) {
        //     $query->where('name', 'like', "%" . $request->name . "%");
        // }

        // if ($request->display_name) {
        //     $query->where('display_name', 'like', "%" . $request->display_name . "%");
        // }

        $ServiceProviders = ServiceProviders::paginate(20);


        //$models = $query->orderBy('id', 'DESC')->paginate(20);

        return view('admin.service-provider.index', compact('ServiceProviders'));
    }

    public function create()
    {
        return view('admin.blog-category.create');
    }

 

    public function show($id)
    {
        $serviceProvider = ServiceProviders::find($id);
        return view('admin.service-provider.show', compact('serviceProvider'));
    }


    public function addAmount(Request $request , Account $account)
    {
        $account->amount = $request->amount;
        $account->user_id = $request->user_id;
        $account->trxno = 'adminfristtrx';
        $account->type = 'MM Firee Balance';
        $account->ref = auth()->user()->name;
        $account->status = 'credit';
        $account->save();
        return back();
    }

    //
    //    public function edit($id) {
    //        $model = service_providers::find($id);
    //
    //
    //        return view('admin.blog-category.edit', compact('model'));
    //    }
    //
    //    public function update(BlogCategoryUpdate $request, $id) {
    //
    //        try {
    //
    //
    //            $input = $request->all();
    //
    //            $image = $request->file('image');
    //            if ($image) {
    //                $input['image'] = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
    //                $ogImagePath = public_path('images/blog-category');
    //                $img = Image::make($image->getRealPath());
    //                $img->resize(500, null, function ($constraint) {
    //                    $constraint->aspectRatio();
    //                })->save($ogImagePath . '/' . $input['image']);
    //            } else {
    //                unset($input['image']);
    //            }
    //            $input['url'] = createUrl($request->url);
    //            $model = service_providers::find($id);
    //            $model->update($input);
    //            $request->session()->flash('success', 'Blog Category has been successfully Updated!');
    //            return redirect(route('blog-category.index'));
    //        } catch (Exception $e) {
    //
    //
    //            $request->session()->flash('error', 'Oops something went wrong try again !');
    //        }
    //    }
    //
    //    public function destroy($id) {
    //        $role = service_providers::findOrFail($id);
    //        $role->forceDelete();
    //        return redirect()->back();
    //    }

}
