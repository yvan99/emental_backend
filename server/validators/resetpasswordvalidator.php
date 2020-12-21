<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
require ($_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/validationhandler/vendor/autoload.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

function resetpasswordValdation($password){
    $results=NULL;
    

    $passwordValidator = v::noWhitespace()->length(6, null)->regex('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{6,}$/')->setName('Password');;
    $passwordValidator->validate($password); // true
    // password validation
    
   try {
        $passwordValidator->assert($password);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }

    return $results;
}
 

?>