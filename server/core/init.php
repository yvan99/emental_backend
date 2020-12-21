<?php
$GLOBALS['config'] = array(
    'mysql' => array(
                'host'=>'127.0.0.1',
                'username'=>'root',
                'password'=>'',
                'db'=>'emental'
    ),
    'remember'=>array(
                'cookie_name'=> 'hash',
                'cookie_expriry'=>'604800'
    ),
    'session'=>array(
           'session_admin'=>'admin',
           'session_medics'=>'medics',
           'session_patient'=>'patient',
           
    ),
    'stripe'=>array(
        'private_key'=>'sk_test_51HAxyeJoHpIDTE07sAK4LIXxZbPUsL4RkhhdPPUlRV7S2VpGx0gCzKO5ltDPXKGljMwt7uvTSU4PELEmdh7j1y0b00uMXPOGK9'
     
 ),
   
    );
  
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/config/config.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/db/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/sqlQueries.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/sanitizer.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/tokenhandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/skuhandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/shop.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/product.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/manager.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/logisticagent.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/client.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/finance.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/admin.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/medic.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/controllers/patient.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/validators/signupvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/validators/managersignupvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/validators/createassociationvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/validators/resetpasswordvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/validators/agentValidation.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/hashinghandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/recaptchaV3.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/phpmailer/index.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/phpmailer/invitationMail.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/phpmailer/resetEmail.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/phpmailer/claimRequest.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/stripehandler/payment.php';
   // include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/test.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/sessionhandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/logistichandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/hashurls.hash.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/passwordhandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/shopcode.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/ordercode.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/managercode.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/clientcode.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/helpers/productcode.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/middleware/checkProduct.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/emental/server/middleware/checklogisticagent.php';
    
    
    

?>