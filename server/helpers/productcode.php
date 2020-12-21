<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function productCode(){
    
    $individual=verificationToken();
    $code="pro"."-".$individual."-".date('m');
    return $code;

}


?>