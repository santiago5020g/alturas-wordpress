<?php

$phpmailer = $_SERVER['DOCUMENT_ROOT']."/wp/phpmailer/PHPMailerAutoload.php";
require($phpmailer);
//$smtp = $_SERVER['DOCUMENT_ROOT']."/wp/mailer/class.smtp.php";
//include($smtp);
$mail = new PHPMailer;


$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensajee"];
$errores = 0;


if($nombre == '')
{
	$errores = 1;
	echo "*Por favor digita el nombre";
	echo "<br>";
}

if($correo == '')
{
	$errores = 1;
	echo "*Por favor digita el correo";
	echo "<br>";
}

if($mensaje == '')
{
	$errores = 1;
	echo "*Por favor digita el mensaje";
	echo "<br>";
}


$body = "<b> Nombre: $nombre</b> <br>
<b> Correo: $correo</b> <br>
<b> Mensaje: $mensaje</b> <br>";


$mail->IsSMTP();
	//$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->Host     = "smtp.gmail.com";
$mail->Username = "alturas.gilberto@gmail.com";
$mail->Password = "9999Maxi";
$mail->Port        = 587;
$mail->AddReplyTo($correo);
$mail->AddAddress('santiago5020g@hotmail.com');
$mail->SetFrom( 'gilbertomazo@gmail.com', 'Gilberto Mazo' ); //Especificamos remitente
$mail->Subject = "Servicio alturas Gilberto Mazo";
$mail->AltBody = "prueba";
$mail->MsgHTML($body);




if($errores == 0)
{
	if(!$mail->Send()) {
	   $errores = 1;
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Mensaje enviado!";
	}
}


echo "<script> $('#mensaje').attr('style','display:block') </script>";
if($errores == 1) {echo "<script> $('#mensaje').attr('class','alert alert-danger') </script>";}
else{echo "<script> $('#mensaje').attr('class','alert alert-success') </script>";}