<?php

namespace App\Http\Controllers;

use App\SMS;
use Illuminate\Http\Request;

class TestSMS extends Controller
{
   public function test(){
      return  SMS::send('01631776875','Test');

        //return 0;
   }
}
