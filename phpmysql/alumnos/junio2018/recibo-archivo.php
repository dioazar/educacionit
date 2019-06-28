<?php 
	require_once('constantes.php');
	require_once('funciones.php');

	if(isset($_POST['texto']))
		$texto = $_POST['texto'];

	if(isset($_FILES['file']))
		$file = $_FILES['file'];

	$ruta = 'files/';
	$myFile = $file['name'];
	$myFile_tmp = $file['tmp_name'];
	move_uploaded_file($myFile_tmp, $ruta.$myFile);

	$extention = pathinfo($ruta.$myFile,PATHINFO_EXTENSION);

	$rString = generateRandomString();
	$file = $ruta.$rString.'.'.$extention;
	rename($ruta.$myFile, $file);
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
		<h1>Manejo de archivo de texto</h1>
		
		<?php 
			//fopen() se utiliza para ver si se pueden abrir los archivos de texto
			if ( fopen($file, 'r') )
			    echo "Pudo abrir el archivo";
			else
		        echo "No es posible abrir el archivo";
		    echo '<br>';
		    var_dump(fopen($file, 'r'));

			echo "<hr>";
			$fp = fopen($file, 'r');

			if ( !$fp )
			{
			    echo "No es posible abrir el archivo \n <br>";
			}else{
		        fpassthru ($fp);
		        fclose($fp);//para cerrar el archivo
			}

			//file() es la mejor herramienta para leer los archivos de texto
			echo "<hr>";
			$texto = file($file);
			var_dump( $texto );
			foreach ($texto as $key => $value) {
				echo utf8_encode($value);
			}


			//fwrite() para cambiar texto
			$fp = fopen($file, 'w'); //lo abro como w (write)
			fwrite($fp, 'cambio el texto');
			fclose($fp); //cierro el archivo
			print_r( file($file) ); //veo cómo quedó
			
		?>

		<p><a href="archivos.php">Volver</a></p>
	</div>
</body>
</html>