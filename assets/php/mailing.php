<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->Port = 1025;

$mail->setFrom("$email", "Client");
$mail->addAddress('support@example.com', 'Admin');
$mail->Subject = "Support: $subject\n";

$mail->Body = "First Name: $firstname\n";
$mail->Body .= "Last Name: $lastname\n";
$mail->Body .= "Country: $country\n";
$mail->Body .= "Email: $email\n";
$mail->Body .= "Message:\n$message\n";

if ($mail->send()) {
  echo 'Email sent successfully! Thanks for sending us your feedback.';
} else {
  echo 'Email could not be sent, please try again later.';
  // echo 'Mailer Error: ' . $mail->ErrorInfo;
}
