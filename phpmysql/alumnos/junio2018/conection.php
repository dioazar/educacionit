<?php 	
	$local = false;

	if($local)
	{
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "comercioit";
	}else{
		$host = "localhost";
		$user = "dioazar";
		$pass = "Montezco64";
		$db = "comercioit";
	}
	
	$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
	$conn->exec("SET CHARACTER SET utf8");
?>