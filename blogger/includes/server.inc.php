<?php 
//add server side services
require_once ($_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php');
$adminId=$_SESSION[config::get("session/session_admin")];
//$token=$_SESSION[config::get("session/token_name")];
if(!$adminId){
  header("location:./");
}

//selection of patient info
$selectAdminInfo=select('*','Admin',"adm_id='$adminId'");
foreach ($selectAdminInfo as $AdminInfo){
 
}
?>