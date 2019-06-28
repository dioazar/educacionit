<?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$mensaje = $_POST['mensaje'];

	enviarMail($nombre, $email, $mensaje);
?>