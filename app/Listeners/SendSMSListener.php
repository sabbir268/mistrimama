<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SMS;

class SendSMSListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        // return $event->user;
        $msg = "Dear " . $event->user->phone_no. "! Thanks for registering in Mistri Mama. Use this referrer code “ " . $event->user->ref_code . " ” to earn reward points. Call +8809610222111 for details.";
        SMS::send($event->user->phone_no, $msg);
    }
}
