<?php 
	
	//incluimos la clase PHPMailer
	//require_once('class.phpmailer.php');
	require 'PHPMailerAutoload.php';
	//instancio un objeto de la clase PHPMailer
	$mail = new PHPMailer(); // defaults to using php "mail()"
	
	//puedo cargar un html externo o html directo en una variable
	$body = file_get_contents('1contenido.html');
	$html = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Prueba 1</title>
			</head>
			<body>
				<h4>Prueba!</h4>
				<p>Acá irían acentos ? </p>
			</body>
			</html>';

	//indico a la clase que use SMTP
	$mail->IsSMTP();
	//permite modo debug para ver mensajes de las cosas que van ocurriendo
	//$mail->SMTPDebug = 1;
	//Debo de hacer autenticación SMTP
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	//indico el servidor de Gmail para SMTP
	$mail->Host = "smtp.gmail.com";
	//indico el puerto que usa Gmail
	$mail->Port = 465;//465
	//indico un usuario / clave de un usuario de gmail
	$mail->Username = "no-reply@amedia.com.ar";
	$mail->Password = "sotelo21";
	$mail->SetFrom('no-reply@amedia.com.ar', 'GrupoAmedia');
	$mail->AddReplyTo("no-reply@amedia.com.ar","GrupoAmedia");	
	$mail->Subject = "SMTP de Gmail";
	//$mail->MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
	$mail->MsgHTML($html);//$body
	//indico destinatario
	$address = "dionel.azar@amedia.com.ar";
	$mail->AddAddress($address, "Nombre completo");

	if(!$mail->Send()) {
	echo "Error al enviar: " . $mail->ErrorInfo;
	} else {
	echo "<br>Mensaje enviado!";
	}
?>