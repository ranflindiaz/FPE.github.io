<?php

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Telefono: " . $telefono . "<br>Correo: " . $correo . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                          // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';             // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('rapolomc@gmail.com');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje enviado desde la pagina de la fundacion';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente.");
        window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo 'Hubo un erro al enviar el mensaje: ', $mail->ErrorInfo;
}
