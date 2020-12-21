<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
function myemail($userEmail, $token)
{
    $developmentMode = false;
    $mail = new PHPMailer($developmentMode);
    // Passing `true` enables exceptions
    try
    {
        //Server settings
        $mail->SMTPDebug = 1; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'justbetweenusteam@gmail.com'; // SMTP username
        $mail->Password = 'justbetweenusTeam@2020'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to
        //Recipients
        $mail->setFrom('justbetweenusteam@gmail.com', 'justbetweenus Team');
        $mail->addAddress($userEmail); // Add a recipient
        $body = '<strong>' . $token . ' </strong> ' . ' est votre code de verification justbetweenus';

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "vérification de l'e-mail «Just Between Us»";
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';

    }
    catch(Exception $e)
    {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

