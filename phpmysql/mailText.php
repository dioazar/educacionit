<?php
	$para      = 'dionelazar@gmail.com';
	$titulo    = 'Probando mail';
	$mensaje   = 'Hola';
	$cabeceras = 'From: no-reply@dionelazar.com' . "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($para, $titulo, $mensaje, $cabeceras))
	{
		echo "Mail enviado!";
	}else{
		echo "No se envió, hubo un problema";
	}
?>