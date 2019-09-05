<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\service_providers as ServiceProviders;
use DB;
use App\Account;
use App\User;
use App\SMS;

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

        $ServiceProviders = ServiceProviders::orderBy('id', 'DESC')->paginate(20);


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


    public function addAmount(Request $request, Account $account)
    {

        // return $request;
        $account->amount = $request->amount;
        $account->user_id = $request->user_id;
        $account->trxno = generateRandomString(10);
        //$account->type = 'Mistrimama bonus';
        $account->type = 'Mistrimama account recharge';
        $account->ref = auth()->user()->name;
        $account->status = 'credit';



        //$account->save();

        if ($account->save()) {
            $balance = Account::where('user_id', $request->user_id)->where('status', 'credit')->sum('amount') - Account::where('user_id', $request->user_id)->where('status', 'debit')->sum('amount');

            $SpPhone = User::find($request->user_id)->phone_no;
            $msg = "Your account recharged with BDT " . round($request->amount) . "/-. Your current online balance: BDT Total " . round($balance) . "/-.";
            SMS::send($SpPhone, $msg);

            $acc = new Account();
            $acc->amount = 500;
            $acc->user_id = $request->user_id;
            $acc->trxno = generateRandomString(10);
            //$account->type = 'Mistrimama bonus';
            $acc->type = 'Mistrimama Bonus';
            $acc->ref = auth()->user()->name;
            $acc->status = 'credit';
            if ($acc->save()) {
                $balance = Account::where('user_id', $request->user_id)->where('status', 'credit')->sum('amount') - Account::where('user_id', $request->user_id)->where('status', 'debit')->sum('amount');
                $msg2 = "You got " . 500 . "/-. Bonus from Mistri Mama. Your current online balance: BDT Total " . round($balance) . "/-.";
                SMS::send($SpPhone, $msg2);
            }
        }

        return back();
    }

    public function spAccounts()
    {
       
        $ServiceProviders = ServiceProviders::paginate(10);
        //  return $ServiceProviders;
        return view('admin.service-provider.accounts', compact('ServiceProviders'));
        
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
