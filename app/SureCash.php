<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SureCash extends Model
{
    public function paymentCheck($transactionId,$mobileNumber)
    {
        $credentials = base64_encode("lcct:lcct@SureCash");
        // $transactionId = "T300000127911";
        $partnerCode = "lcct";
        //$mobileNumber = "01775280411";
        $headr = array();
        $headr[] = 'Accept: application/json';
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: basic ' . $credentials;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.surecashbd.com/api/payment/status/".$partnerCode."/".$transactionId."/".$mobileNumber);
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($requestBody));
        curl_setopt($ch, CURLOPT_USERPWD, $credentials);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        $response = curl_exec($ch);
        $res = json_decode($response);
        return $res;
        
    }
}
