<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

/*** database name ***/
$dbname = 'phpdb';

try {

    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	$sql = "insert into usuarios( usuario, psw, nombre, apellido) values('prueba1', 'prueba2', 'prueba3', 'prueba4')";
	$os = $conn->exec($sql);
	
	echo "Registro insertado!";
}
catch(PDOException $e)
    {

    /*** echo the sql statement and error message ***/
    echo $sql . '<br />' . $e->getMessage();
    }
?>