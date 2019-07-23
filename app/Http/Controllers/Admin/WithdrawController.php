<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawRequest;

class WithdrawController extends Controller {
    public function index(Request $request) {

        $WithDrawAll = WithdrawRequest::where('status','=','0')->paginate(20);
        return view('admin.withdraw.index', compact('WithDrawAll'));
    }     
}
