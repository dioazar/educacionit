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

	$sql = "INSERT INTO usuarios (usuario, nombre, apellido, edad) VALUES (?, ?, ?, ?)";
    $usu = "mrodriguez";
    $nom = "Manuel";
    $ape = "Rodriguez";
    $edad = 20;
     
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $usu, PDO::PARAM_STR, 10);
	$stmt->bindParam(2, $nom, PDO::PARAM_STR, 20);
	$stmt->bindParam(3, $ape, PDO::PARAM_STR, 20);
	$stmt->bindParam(4, $edad, PDO::PARAM_INT);
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