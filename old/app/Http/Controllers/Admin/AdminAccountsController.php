<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawRequest;
use App\Account;
use App\Heading;

class AdminAccountsController extends Controller
{
    public function index()
    {
        $accounts = Account::orderBy('id','DESC')->paginate(20);
        $headingsRevenue = Heading::where('type','revenue')->get();
        $headingsExpence = Heading::where('type','expense')->get();
        return view('admin.account.index', compact('accounts','headingsRevenue','headingsExpence'));
    }


    public function insert(Account $account, Request $request)
    {

        $account->user_id = auth()->user()->id;
        $account->amount = $request->amount;
        $account->heading = $request->heading;
        $account->trxno = generateRandomString(7);
        $account->type = $request->type;
        $account->details = $request->details;
        $account->ref = 'admin';
        $account->status = $request->status;
        $account->date = $request->date;

        if ($account->save()) {
            return back();
        } else {
            return back()->with('Something is not right');
        }
    }

    public function heading()
    {
        $headings = Heading::paginate(10);
        return view('admin.account.headings.index', compact('headings'));
    }

    public function headingInsert(Heading $heading, Request $request)
    {
        $heading->title = $request->title;
        $heading->type = $request->type;
        $heading->save();

        return  redirect()->back();
    }


    public function headingEdit($id)
    {
        $heading = Heading::find($id);
        return view('admin.account.headings.edit', compact('heading'));
    }

    public function headingUpdate(Request $request)
    {
        $heading = Heading::find($request->id);
        $heading->title = $request->title;
        $heading->type = $request->type;
        $heading->save();
        return redirect()->route('admin.accounts.headings');
    }

    public function headingDelete($id)
    {
        $heading = Heading::find($id);
        $heading->delete();
        return redirect()->route('admin.accounts.headings');
    }
}
