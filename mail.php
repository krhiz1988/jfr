<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'c.rivera.henriquez@gmail.com';                     // SMTP username
    $mail->Password   = 'cristian23';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('c.rivera.henriquez@gmail.com', 'Mailer');
    $mail->addAddress($_POST['email'], $_POST['nombre']);     // Add a recipient


 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'Mensaje:'.$mensaje;


    $mail->send();
    echo 'La jugada se ha enviado correctamente.';
} catch (Exception $e) {
    echo "Hubo un problema: {$mail->ErrorInfo}";
}
?>