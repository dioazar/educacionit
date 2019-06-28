<?php 
	require_once('header.php');
	require_once('conection.php');
	require_once('funciones.php');

	$miscosas = $conn->prepare('SELECT * FROM miscosas');
	$miscosas->execute();

	while ($row = $miscosas->fetch()) 
	{
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}

	if(isset($_POST['nombre']))
	{
		$nombre = $_POST['nombre'];
		$imagen = $_FILES['imagen'];

		$string = generateRandomString();
		$miFile = 'files/'.$imagen['name'];

		move_uploaded_file($imagen['tmp_name'], $miFile);

		$extention = pathinfo('files/'.$imagen['name'],PATHINFO_EXTENSION);
		$file = $string.'.'.$extention;

		//rename($miFile, $file);
		$result = $conn->prepare('INSERT INTO miscosas(nombre, imagen) VALUES (:nombre, :imagen)');
		$result->bindParam(':nombre', $nombre, PDO::PARAM_STR);
		$result->bindParam(':imagen', $miFile, PDO::PARAM_STR);
		$result->execute();
	}
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="text" name="nombre">
	<input type="file" name="imagen">
	<input type="submit">
</form>