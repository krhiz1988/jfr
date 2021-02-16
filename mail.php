<?php

$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$body = "Nombre:" . $nombre . "<br>Correo: " . $email . "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.live.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'matador_16_11@hotmail.com';                     // SMTP username
    $mail->Password   = 'Cristian30.';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addAddress('cristian.rivera@meetcard.cl');     // Add a recipient


 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = $body;


    $mail->send();
    echo 'La jugada se ha enviado correctamente.';
} catch (Exception $e) {
    echo "Hubo un problema: {$mail->ErrorInfo}";
}
?>