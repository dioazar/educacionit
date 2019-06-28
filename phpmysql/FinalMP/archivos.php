<?php 
	require_once('constantes.php');
	require_once('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo HEADER; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Manejo de archivos</h1>
		<form action="recibo-archivo.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="nombre">Texto</label>
			    <input type="text" class="form-control" placeholder="Texto" name="texto">
		  	</div>
		  	<div class="form-group">
			    <input type="file" class="form-control-file" name="file">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</body>
</html>