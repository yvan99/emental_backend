<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/emental/server/core/init.php';

   function recaptchaValidation($captcha){
    if (!$captcha) {
        //Do something with error
    } else {
        $secret   = '6LdsU80ZAAAAAFKoH_fxJ8tGG5RH6Q0yYuXNC0D5';
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
        );
        // use json_decode to extract json response
        $response = json_decode($response);
    
        if ($response->success === false) {
            //Do something with error
            
        }
    }
    
    //... The Captcha is valid you can continue with the rest of your code
    //... Add code to filter access using $response . score
    if ($response->success==true && $response->score >= 0.5) {
        //Do something to accept access
        return true;
    }
    if ($response->success==true && $response->score <= 0.5) {
        //Do something to denied access
        return false;
    }
   }