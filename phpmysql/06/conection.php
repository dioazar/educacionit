<?php 	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "ComercioIT";
	
	$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
	$conn->exec("SET CHARACTER SET utf8");
?>