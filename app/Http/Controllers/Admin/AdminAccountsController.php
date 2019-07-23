<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawRequest;
use App\Account;
use App\Heading;

class AdminAccountsController extends Controller {
    public function index() {
        $accounts = Account::paginate(20);
        return view('admin.account.index',compact('accounts'));
    }     


    public function insert(Account $account, Request $request) {
        
        $account->user_id = auth()->user()->id;
        $account->amount = $request->amount;
        $account->trxno = generateRandomString(7);
        $account->type = $request->type;
        $account->details = $request->details;
        $account->ref = 'admin';
        $account->status = $request->status;

        if($account->save()){
            return back();
        }else{
            return back()->with('Something is not right');
        }
    }     

    public function insertHeading(Heading $heading , Request $request) {
        $heading->title = $request->title;
        $heading->description = $request->description;
        $heading->save();
    }


}
