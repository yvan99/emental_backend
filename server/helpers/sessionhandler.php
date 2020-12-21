<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
session_start();

function create_session($id,$type){
    //create session
    if($type==='admin'){
        
    $_SESSION[strval(config::get('session/session_admin')) ] = $id;
    
    }elseif($type==='medics'){
        $_SESSION[strval(config::get('session/session_medics')) ] = $id;
  
    }elseif($type==='patient'){
        $_SESSION[strval(config::get('session/session_patient')) ] = $id;

    }
    
    //$_SESSION[strval(config::get('session/token_name')) ] = $token;

}

function destroy_session(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

?>
