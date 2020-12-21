<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function passwordGenerator($type){
    $individual=verificationToken();
    $password=$type.$individual."?";
    return $password;

}


?>