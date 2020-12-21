<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/emental/server/core/init.php';

function verificationToken(){
    return rand(100000,999999);
  }
  // verificationToken() will genete six number randomoly


function crftoken(){
          return md5(rand(1,9999999));
          //crftoken() will generate token to fight crf attack
   }



?>