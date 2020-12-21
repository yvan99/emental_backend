<?php
    $hashsalt  = "joijy278ueoadsjkju983ewjmsdkjhdsjnds38920922!@#$^49bjdd!$%^*I))(^&**$$##^^*)_)(*&&%%$&%*&*hisjyussfuksoickyoujodugoxyy97w2AJtrendingzoneOAIA,36742192208wehdsjkznkjbuygt718t78ajiajaklmzljhyugatyqrqUUQHANJKADDqt78ywqanskjda";
    $hashsalt2 = "joijy27@@$%^&**@@4898292328ueoadsjkdjoidj948940633829jusst889398557935338393983ewjmsdkjhdsjnds!$%^*I))(^&**$$##^^*)_)(*&&%%$&%*&*hisjyussfuksoickyoujodugoxyy97w2AJtrendingzoneOAIA,36742192208wehdsjkznkjbuygt718t78ajiajaklmzljhyugatyqrqUUQHANJKADDqt78ywqanskjda";

#hashing urls
function actor($actor){
  $actor=base64_encode(urlencode(($actor)));
  return $actor;

}
function protector1(){
    $hashsalt  = "joi";
     $actor=base64_encode(urlencode(($hashsalt)));
    return $actor;
  
  }

function protector2(){
    $hashsalt2 = "tyqrqUUQHANJKADDqt78ywqanskjda";
    $protector2=base64_encode(urlencode(($hashsalt2)));
   return $protector2;
}

function protectionHolder($actor){
    $protection="requestajaxhiddenId=".protector1()."=&&requestedtracker=".actor(123)."=&&selectedassociationId=".protector2();
    return $protection;
}
function unhash($hash){
  $unhash = base64_decode(urldecode($hash));
  return $unhash;
}