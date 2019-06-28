<?php 
	$nombre = $_POST['nombre'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Receptor del formulario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<?php 
		echo $nombre;
	?>
	<br>
	<a href="formulario.php">Volver</a>
</body>
</html>