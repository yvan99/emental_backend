<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function orderCode($date){
    
    $individual=verificationToken();
    $code="Ord"."-".$individual."-".$date;
    return $code;

}


?>