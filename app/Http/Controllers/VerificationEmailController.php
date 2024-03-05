<?php

namespace App\Http\Controllers;

require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class VerificationEmailController extends Controller
{
    //Load Composer's autoloader

    //Create an instance; passing `true` enables exceptions
    public function envoiEmailVerification($email){
        $email_envoyeur = $_ENV["MAIL_USERNAME"];
        $password = $_ENV["MAIL_PASSWORD"];
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $email_envoyeur;                     //SMTP username
            $mail->Password   = $password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom($email_envoyeur);
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            return 'Un email vous à été envoyé pour confirmer votre identité';
        }
        catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
