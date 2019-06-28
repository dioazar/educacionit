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
	$sql = 'SELECT * FROM usuarios';
	$os = $conn->query($sql);
	
	foreach ($os as $row) {
		echo $row['nombre'] . "<br>\n";
		echo $row['apellido'] . "<br>\n";
		echo $row['mail'] . "<br>\n";
		echo "<br>";
		}
}
catch(PDOException $e)
    {

    /*** echo the sql statement and error message ***/
    echo $sql . '<br />' . $e->getMessage();
    }
?>