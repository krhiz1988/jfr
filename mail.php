<?php
    $to = 'c.rivera.henriquez@gmail.com';
    $subject = " Juan Francisco Reyes Concejal";
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $msg = 'Nombre:' .$name. '<br>'. 'Email:' .$email. ' <br>' . 'Teléfono:'. $telefono . '<br>' . 'Asunto:' .$subject. '<br>'. 'Mensaje:'. $_POST['mensaje'];

    $from = 'c.rivera.henriquez@gmail.com';
    $headers = "From:$from"."/r/n";
    $headers = "Content-type:text/html;";
    if(mail($to,$subject,$msg,$headers)){
        echo"<script> alert('Mensaje enviado'); window.location.href= 'index.html';</script>";
        
    }else{
        echo"<script> alert('Mensaje no enviado'); window.location.href= 'index.html';</script>";
    }

?>