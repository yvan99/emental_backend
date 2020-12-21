<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
require 'vendor/autoload.php';
function createIntent($amount,$currency,$orderCode){
  // Set your secret key. Remember to switch to your live secret key in production!
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  $private_key= strval(config::get('stripe/private_key'));
  //$amount will add amount use have to send to association member with  platform fees 
  \Stripe\Stripe::setApiKey($private_key);

  $payment_intent = \Stripe\PaymentIntent::create([
    'amount' => $amount,
    'currency' => $currency,
    'payment_method_types' => ['card'],
    
  ]);
  $payment_intentId=$payment_intent['id'];
  
  update('payment','pay_intent=:pay_intent',"ord_code='$orderCode'",['pay_intent'=>$payment_intentId,]);

  return $payment_intent;
  
  
  
  }

?>