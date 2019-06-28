<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'probando';

	//abro mi conexión a la DB
	$conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);

	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		//Escribo mi query
		$query = $conn->prepare("SELECT nombre FROM usuarios WHERE id = :paramId");
		$query->bindParam(":paramId", $id, PDO::PARAM_INT);

		//Ejecuto mi query
		$query->execute();

		//Leo mi resultado de la query y la recorro
		while($row = $query->fetch())
		{
			//if($row['nombre'] == 'aldana')
			//	break;
			echo '<pre>';
			print_r($row);
			echo '</pre>';
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<input type="number" name="id" placeholder="id">
		<input type="submit">
	</form>
</body>
</html>