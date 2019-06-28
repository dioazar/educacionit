<?php 
	$passwordHasheado = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

	var_dump( password_verify("rasmuslorf", $passwordHasheado) );
?>