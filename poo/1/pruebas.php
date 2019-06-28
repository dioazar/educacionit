<?php 
	$hostname 	=	'localhost';
	$username 	= 	'root';
	$password	= 	'';
	$dbname 	= 	'phpdb';

	$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	$stmt = $pdo->prepare("SELECT * FROM peliculas");
	//$stmt->bindValue(":cod",$cod);
	$stmt->execute();
	var_dump($stmt->fetch());
?>