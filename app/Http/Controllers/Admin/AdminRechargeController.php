<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\WithdrawRequest;
use App\Account;
use App\RechargeRequest;
use Carbon\Carbon;
use App\SMS;

class AdminRechargeController extends Controller
{
    public function index()
    {
        $requests = RechargeRequest::where('status', '!=', 1)->orderBy('id', 'DESC')->paginate(20);
        return view('admin.recharge.index', compact('requests'));
    }

    public function status(Request $request, RechargeRequest $rechargeRequest, Account $account)
    {

        $rr = $rechargeRequest->find($request->id);
        if ($request->status == 1) {
            $account->amount =  round($rr->amount);
            $account->user_id = $rr->user_id;
            $account->trxno = $rr->trxn;
            $account->type = $rr->mfs;
            $account->details = 'Mistri Mama Account Recharge';
            $account->ref = auth()->user()->name;
            $account->status = 'credit';
            $account->save();

            $rr->status = $request->status;
            $rr->approved_by = auth()->user()->name;
            $rr->approved_time = date("Y-m-d", time());

            $rr->save();

           

            if($rr->save()){
                $SpPhone = $rr->user->phone_no;
                $msg = "Your account recharged with BDT ". round($rr->amount) ."/-. Your current online balance: BDT Total ". totalBalance($rr->user_id) ."/-.";
                SMS::send($SpPhone,$msg);
            }

            return redirect()->back()->with('success', 'Recharge Request approved');
        } else {
            return redirect()->back()->with('danger', 'Recharge Request declined');
        }
    }


    // public function check(){
    //     return MfsCharge('bkash');
    // }


    public function rechargeRequestExport()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $data = RechargeRequest::select('id', 'user_id', 'trxn')->where('status', '=', 0)->get();
        $columns = array('id', 'user_id', 'trxn');

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $item) {
                fputcsv($file, array($item->id, $item->user_id, $item->trxn));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function rechargeRequestImport(Request $request, RechargeRequest $rechargeRequest, Account $account)
    {
        $file = $request->file('recharge_file');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
        $file = public_path('uploads/' . $file->getClientOriginalName());

        $customerArr = csvToArray($file);
        //dd($customerArr);
        for ($i = 0; $i < count($customerArr); $i++) {
            if ($customerArr[$i]['status'] == 1) {
                $rr = $rechargeRequest->find($customerArr[$i]['id']);
                $account->amount =  $rr->amount;
                $account->user_id = $rr->user_id;
                $account->trxno = $rr->trxn;
                $account->type = $rr->mfs;
                $account->details = 'Mistri Mama Account Recharge';
                $account->ref = auth()->user()->name;
                $account->status = 'credit';
                $account->reason = 'recharge';
                $account->save();

                $rr->status = $request->status;
                $rr->approved_by = auth()->user()->name;
                $rr->approved_time = date("Y-m-d", time());


                if($rr->save()){
                    $SpPhone = $rr->user->phone_no;
                    $msg = "Your account recharged with BDT ". round($rr->amount) ."/-. Your current online balance: BDT Total ". totalBalance($rr->user_id) ."/-.";
                    SMS::send($SpPhone,$msg);
                }
    

                $accountmm = new Account();
                $accountmm->amount = (MfsCharge($rr->mfs)*$rr->amount / 100);
                $accountmm->user_id = 1;
                $accountmm->trxno = $rr->trxn;
                $accountmm->type = $rr->mfs;
                $accountmm->heading = 'MFS Charge Adjustment';
                $accountmm->details = 'MFS Charge Adjustment';
                $accountmm->ref = auth()->user()->name;
                $accountmm->status = 'debit';
                $accountmm->reason = 'mfscharge';
                $accountmm->save();
            }
        }

        return redirect()->back()->with('success', $i.' Recharge request processed successfully.');
    }
}
