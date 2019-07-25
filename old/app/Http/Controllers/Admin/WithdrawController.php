<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\WithdrawRequest;
use App\Account;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {

        $WithDrawAll = WithdrawRequest::where('status', '=', '0')->paginate(20);
        return view('admin.withdraw.index', compact('WithDrawAll'));
    }

    public function approve(Request $request)
    {
        $wr = WithdrawRequest::find($request->id);
        $wr->status = 1;

        $acc = Account::where('ref', $wr->id)->where('reason', 'pending_cashout')->first();
        $account = Account::find($acc->id);
        $account->trxno = generateRandomString(10);
        $account->type = $wr->type;
        $account->details = 'Cashout';
        $account->ref = auth()->user()->name;
        $account->reason = 'cashout';
        $account->status = 'debit';


        if ($account->save()) {
            if ($wr->save()) {
                return redirect()->back()->with('success', 'Cash Our request approve!');
            } else {
                return redirect()->back()->with('error', 'Something is wrong!');
            }
        } else {
            return redirect()->back()->with('error', 'Something is wrong!');
        }
    }



    public function withdrawRequestExport()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $data = WithdrawRequest::select('id', 'user_id', 'mfs_number', 'type')->where('status', '=', 0)->get();
        $columns = array('id', 'user_id', 'mfs_number', 'type');

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $item) {
                fputcsv($file, array($item->id, $item->user_id, $item->mfs_number, $item->type));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function withdrawRequestImport(Request $request, WithdrawRequest $WithdrawRequest, Account $account)
    {
        $file = $request->file('withdraw_file');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
        $file = public_path('uploads/' . $file->getClientOriginalName());

        $customerArr = csvToArray($file);
        //dd($customerArr);
        for ($i = 0; $i < count($customerArr); $i++) {
            if ($customerArr[$i]['status'] == 1) {
                $wr = WithdrawRequest::find($customerArr[$i]['id']);
                $wr->status = 1;
                $acc = Account::where('ref', $wr->id)->where('reason', 'pending_cashout')->first();
                $account = Account::find($acc->id);
                $account->trxno = $customerArr[$i]['trxnid'];
                $account->type = $wr->type;
                $account->details = 'Cashout';
                $account->ref = auth()->user()->name;
                $account->reason = 'cashout';
                $account->status = 'debit';

                if ($account->save()) {
                    $wr->save();
                    // if ($wr->save()) {
                    //     // $SpPhone = $wr->user->phone_no;
                    //     // $msg = "Your account recharged with BDT " . round($wr->amount) . "/-. Your current online balance: BDT Total " . totalBalance($wr->user_id) . "/-.";
                    //     // SMS::send($SpPhone, $msg);

                    // }
                }
            }
        }

        return redirect()->back()->with('success', $i . ' Cashout request processed successfully.');
    }
}
