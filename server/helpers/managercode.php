<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function managerCode($gender){
    if ($gender==="male")$gender=1; else $gender=0;
    $individual=verificationToken();
    $code="man"."-".$individual."-".$gender;
    return $code;

}


?>