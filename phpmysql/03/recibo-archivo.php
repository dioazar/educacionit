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
		<h1>Manejo de archivos</h1>
		<div class="card" style="width: 18rem;">
		  	<img class="card-img-top" src="<?php echo $file; ?>" alt="Imagen">
		  	<div class="card-body">
		    	<p class="card-text"><?php echo $texto ?></p>    	
		  	</div>
		</div>
		<p><a href="http://php.net/manual/es/ref.filesystem.php">Manual de funciones con archivos</a></p>
		<p><a href="http://php.net/manual/es/function.fopen.php">fopen()</a></p>
		<?php 
			//fopen() se utiliza para abrir los archivos de texto
			if ( fopen($file, 'r') )
			    echo "Pudo abrir el archivo";
			else
		        echo "No es posible abrir el archivo";

		    //file_exists() 
		    if(file_exists($file))
		    	ejemplo('file_exists()', 'existe');

		    //filesize()
		    ejemplo('filesize()', filesize($file));
		    echo format_size(filesize($file));

		    echo '<pre>';
		    print_r(pathinfo($file));
		    echo '</pre>';
		    
			if (file_exists($file)) {
			    ejemplo('fileatime()', "se accedió a $file en: " . date("F d Y H:i:s.", fileatime($file)) );
			}

		    //unlink()
		    //unlink($file);
		?>

		<p><a href="archivos.php">Volver</a></p>
	</div>
</body>
</html>