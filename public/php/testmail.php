<?php

require ('phpmailer/Exception.php');
require ('phpmailer/PHPMailer.php');
require ('phpmailer/SMTP.php');

$mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail->IsSMTP(); // enable SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPAuth = true; // authentication enabled
//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//$mail->Host = "smtp.gmail.com";
//$mail->Port = 465; // or 587
//$mail->IsHTML(true);
//$mail->Username = "gotiel.orm@gmail.com";
//$mail->Password = "RaKman1493";
$mailToSend = "gotiel.orm@gmail.com";
$mail->SetFrom("oscar.rangel@lunave.com");
$mail->Subject = "Testing";
$mail->Body = "hello222";
$mail->AddAddress($mailToSend);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?>