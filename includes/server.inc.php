<?php 
//add server side services
require_once ($_SERVER['DOCUMENT_ROOT'].'/emental/server/core/init.php');
$patientId=$_SESSION[config::get("session/session_patient")];
//$token=$_SESSION[config::get("session/token_name")];
if(!$patientId){
  header("location:login");
}

//selection of patient info
$selectpatientInfo=select('*','patient',"pat_id='$patientId'");
foreach ($selectpatientInfo as $patientInfo){
 
}
?>