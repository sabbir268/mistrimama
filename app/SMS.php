<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    public static function send($contacts, $msg)
    {

        $api_key = "C20016585b5d65039143f5.68321617";
        $senderid = 'Mistri Mama';
        $URL = "http://bangladeshsms.com/smsapi?api_key=" . urlencode($api_key) . "&type=unicode&contacts=" . urlencode($contacts) . "&senderid=" . urlencode($senderid) . "&msg=" . urlencode($msg);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 0);
        try {
            $output = $content = curl_exec($ch);
            print_r($output);
        } catch (Exception $ex){
            $output = "-100";
        }
        return $output;
    }
}
