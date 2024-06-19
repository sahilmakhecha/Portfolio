<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['send']))
    {

    $name = ($_POST['name']);
    $email =($_POST['email']);
    $subject =($_POST['subject']);
    $message =($_POST['message']);

require 'Phpmailer/SMTP.php';
require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sahilmakhecha007@gmail.com';                     //SMTP username
    $mail->Password   = 'npxlxzxmwmwobuht';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sahilmakhecha007@gmail.com', 'ConactForm');
    $mail->addAddress('sahilmakhecha007@gmail.com', 'hiiuser');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Subject - $subject";
    $mail->Body    = "Sender name - $name  <br> Sender email - $email <br> Message - $message";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

    }

    
    ?>