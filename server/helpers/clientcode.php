<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function clientCode($gender){
    if ($gender==="male")$gender=1; else $gender=0;
    $individual=verificationToken();
    $code="cli"."-".$individual."-".$gender;
    return $code;

}


?>