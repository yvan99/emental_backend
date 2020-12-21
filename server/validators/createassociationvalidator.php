<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
require ($_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/validationhandler/vendor/autoload.php');


use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;


function CreateAssociationValdation($name,$max_member,$amount,$date_of_start,$description){
    $results=NULL;
    //this variable will hold results of validation 
    $nameValidator = v::length(3, 30)->setName('name');;
    $nameValidator->validate($name); // true

    //validation of name

    $max_memberValidator = v::number()->max(30)->min(2)->setName('number of members');
    $max_memberValidator->validate($max_member); // true
   
    //validation of maximum member 

    $amountValidator = v::number()->max(1000000)->min(1);
    $amountValidator->validate($amount); // true

    // validation of amount

    $date_of_startValidator =v::date('m/d/Y');
    $date_of_startValidator->validate($date_of_startValidator); // true

    // validation of starting date
    $descriptionValidator = v::length(3, null)->setName('description');
    $descriptionValidator->validate($description); // true

    
   
    try {
        $nameValidator->assert($name);
    } catch(NestedValidationException $exception) {
       $results=$exception->getMessages();
    }
    try {
        $max_memberValidator->assert($max_member);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }
    try {
        $amountValidator->assert($amount);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }
    try {
        $date_of_startValidator->assert($date_of_start);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }
    try {
        $descriptionValidator->assert($description);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }

    return $results;
}
 

?>