<?php
function escape($string){

    @$string = trim($string);
    $string = stripslashes($string);
    $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
    return $string;

}

?>
