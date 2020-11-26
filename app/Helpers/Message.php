<?php

use App\Models\Site\SentSMS;

function send_sms($text, $phone_number){
   
    SentSMS::create([
        'sms_text'             => $text,
        'sms_phone_number'     => $phone_number,
        'created_at'             => date('Y-m-d H:i:s'),
    ]);

    //call Jabbar API here

    return true;
}




?>