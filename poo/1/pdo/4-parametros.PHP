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

	$sql = "INSERT INTO usuarios (usuario, nombre, apellido) VALUES (:usu, :nom, :ape)";
    $usu = "jperez2";
    $nom = "Juan";
    $ape = "perez";
     
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':usu', $usu, PDO::PARAM_STR, 10);
	$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 20);
	$stmt->bindParam(':ape', $ape, PDO::PARAM_STR, 20);
	$stmt->execute();


	$sql = 'SELECT * FROM usuarios';
    $conn->prepare($sql);
	echo "<table border='1' cellpaging='0'>";
	foreach ($conn->query($sql) as $row) {
		echo "<tr>";
		echo "<td>". $row['nombre'] . "</td>";
		echo "<td>". $row['apellido'] . "</td>";
		echo "<td>". $row['mail'] . "</td>";
		echo "</tr>";
		}
	echo "</table>";
}
catch(PDOException $e)
    {

    /*** echo the sql statement and error message ***/
    echo $sql . '<br />' . $e->getMessage();
    }
?>