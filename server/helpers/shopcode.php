<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function shopCodeGenerator($year){
    $individual=verificationToken();
    $code="St"."-".$individual."-".$year;
    return $code;

}


?>