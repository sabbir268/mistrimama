<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\service_providers as ServiceProvider;
use App\Account;
use App\User;
use App\OrderDetails;
use App\SMS;

class Scheme extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheme:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check sp if eligable for scheme and give them there gift.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $allSP = ServiceProvider::where('status', 1)->take(5)->get();
        foreach ($allSP as $sp) {
            $GetLastWeekOrders = OrderDetails::where('sp_id', $sp->id)->where('status', '5')->whereIn('order_from', ['esp', 'comrade'])->whereBetween('sp_accept_time', [Carbon::now('Asia/Dhaka')->subDays(7)->toDateTimeString(), Carbon::now('Asia/Dhaka')->toDateTimeString()])->paginate(5);

            // SMS::send('01631776875','Hello');
            //echo count($GetLastWeekData);
            // sleep(5);
            if (count($GetLastWeekOrders) >= 4) {
                $account = new Account();
                $account->user_id = $sp->id;
                $account->trxno = generateRandomString(10);
                $account->type = 'virtual';
                $account->reason = 'bonus';
                $account->ref = 'admin';
                $account->status = 'credit';
            /** Mistrimama expenses add*/
                $accountmm = new Account();
                $accountmm->user_id = 1;
                $accountmm->trxno = generateRandomString(10);
                $accountmm->type = 'virtual';
                $accountmm->reason = 'bonus';
                $accountmm->ref = 'SP:'.$sp->sp_code;
                $accountmm->status = 'debit';

                if (count($GetLastWeekOrders) >= 4) {
                    $bonus = 150.00;
                    $account->details = 'Bonus Category(A)';
                    $accountmm->details = 'Bonus Category(A)';
                } elseif (count($GetLastWeekOrders) >= 20 && count($GetLastWeekOrders) < 30) {
                    $bonus = 80.00;
                    $account->details = 'Bonus Category(B)';
                    $accountmm->details = 'Bonus Category(B)';
                } elseif (count($GetLastWeekOrders) >= 4 && count($GetLastWeekOrders) < 5) {
                    $bonus = 50.00;
                    $account->details = 'Bonus Category(B)';
                    $accountmm->details = 'Bonus Category(B)';
                } else {
                    $bonus = 00.00;
                }

                $account->amount = $bonus;
                $accountmm->amount = $bonus;
                $account->save();
                $accountmm->save();
              //  SMS::send($sp->phone_no,'You got '.$bonus.' bonus from Mistrimama');
            }
        }
       SMS::send('01313476474','Corn Jobs working bruh');
       //echo "ok";
    }
}
