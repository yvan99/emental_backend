<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';

function skuGenerator($category,$qty){
    $individual=verificationToken();
    $sku=$category."-".$individual."-".$qty;
    return $sku;

}


?>