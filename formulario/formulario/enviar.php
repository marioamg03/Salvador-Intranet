<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Correo = $_POST['Correo'];
$Mensaje = $_POST['Mensaje'];
$Telefono = $_POST['Telefono'];

if ($Nombre=='' || $Correo=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("formulario/formulario/includes/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = ("info@franquiciasfumigaciones.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
    $mail->FromName = $Nombre; 
    $mail->AddAddress("mensajes@franquiciasfumigaciones.com"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".
    "Email: $Correo \n<br />".
    "Tel: $Telefono \n<br />".
    "Mensaje: $Mensaje \n<br />";

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "mail.franquiciasfumigaciones.com:587";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "info@franquiciasfumigaciones.com";  // Correo Electrónico
    $mail->Password = "Franquicias2016"; // Contraseña

    if ($mail->Send())
    echo "<script>alert('Formulario Enviado');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>