<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

/*** database name ***/
$dbname = 'phpdb';

    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	$sql = 'SELECT * FROM usuarios';

    /*** fetch into an PDOStatement object ***/
    $stmt = $conn->query($sql);

	/*** echo number of columns ***/
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $result[nombre] ."<br>";
    echo $result[apellido] ."<br>";
    echo $result[mail] ."<br>";
    echo $result[edad] ."<br>";
    
	
?>