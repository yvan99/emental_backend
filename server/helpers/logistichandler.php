<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function logisticAgentCode($total){
    $total=escape($total);
    $individual=verificationToken();
    $code='LOG'."-".$individual."-".$total;
    return $code;

}


?>
