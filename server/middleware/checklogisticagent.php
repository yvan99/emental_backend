<?php
function checkLogisticAgent($params)
{
     // Get a single POST parameter
     $fname = $params['fname'];
     $lname=$params['lname'];
     $phone= $params['phone'];
     $email= $params['email'];
     $country= $params['country'];
     $city= $params['city'];
     $code= $params['code'];
     $dob= $params['dob'];
     $gender= $params['gender'];
     $logisticAgent= new logistic($fname,$lname,$phone,$email,$country,$city,$dob,$gender,$code);
     $result=$logisticAgent->signup();
     return $result;
}



?>