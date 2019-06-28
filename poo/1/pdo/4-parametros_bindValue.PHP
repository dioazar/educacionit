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
     
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, "mrodriguez", PDO::PARAM_STR );
	$stmt->bindValue(2, "Manuel", PDO::PARAM_STR );
	$stmt->bindValue(3, "Rodriguez", PDO::PARAM_STR );
	$stmt->bindValue(4, 20, PDO::PARAM_INT);
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