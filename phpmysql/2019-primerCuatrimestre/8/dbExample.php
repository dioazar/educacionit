<?php 	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "probando";
	
	$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
	$conn->exec("SET CHARACTER SET utf8");

	var_dump($conn);

	$usuarios = $conn->prepare("SELECT * FROM usuarios");
	$usuarios->execute();

	while($row = $usuarios->fetch())
	{
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<thead>
			<th>Nombre</th>
			<th>Apellido</th>
		</thead>
		<tbody>
			<?php 
				while($row = $usuarios->fetch())
				{
					echo '<tr>';
					//echo '<pre>';
					//print_r($row);
					//echo '</pre>';
						echo '<td>'.$row['nombre'].'<td>';
						echo '<td>'.$row['apellido'].'<td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
</body>
</html>