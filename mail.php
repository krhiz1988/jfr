<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mensaje = $_POST['mensaje'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$body = "Nombre: " . $nombre ."<br>Apellido: ".$apellido. "<br>Correo: " . $email . "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

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
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contactojfr2021@gmail.com';                     // SMTP username
    $mail->Password   = 'concejal2021';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addAddress('juanfcoprovidencia2021@gmail.com');     // Add a recipient


 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Formulario de Contacto';
    $mail->Body = $body;
    $mail->CharSet = 'UTF-8';


    $mail->send();
    echo 
    "<script> alert('La jugada se ha enviado correctamente.'); window.location.href='index.html'</script>;";
} catch (Exception $e) {
    echo "<script> alert('La jugada no se ha enviado correctamente.'); window.location.href='index.html'</script>;";
}
?>