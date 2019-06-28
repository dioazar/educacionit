<?php 
	require 'PHPExcel/Classes/PHPExcel.php';

	//var_dump($_FILES);

	$datos = insMentoresExcel($_FILES);

	function insMentoresExcel($file)
	{
		//guardo el excel en la carpeta "archivos_excel/"
		echo '<pre>';
		print_r($file);
		echo '</pre>';

		$ruta = 'excels/';
		$archivoExcel = $file['excel']['name'];
		move_uploaded_file($file['excel']['tmp_name'], $ruta.$archivoExcel);

		$extention = pathinfo($ruta.$archivoExcel,PATHINFO_EXTENSION);

		$file = $ruta.$archivoExcel;

		include_once(__DIR__.'/PHPExcel/reader.php');

		$connection = new Spreadsheet_Excel_Reader(); // our main object
		if(is_bool( $connection->read($file) ) )
		{
			unlink($file);
			die();
		}

		$totalRows = $connection->sheets[0]['numRows'];
		$totalCols = $connection->sheets[0]['numCols'];

		$response = array();
		$j = 0;

		for ($i=2; $i <= $totalRows; $i++)
		{
			$nombre = $connection->sheets[0]["cells"][$i][1];//B
			$precio = $connection->sheets[0]["cells"][$i][2];//A

			$arrayName = array( 
								'linea'	 => $i,
								'nombre' => utf8_encode($nombre),
								'precio' => $precio,
									);
			
			$response[$j] = $arrayName;
			$j++;
		}

		return $response;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver excel</title>
</head>
<body>
	<?php 
		echo '<pre>';
		print_r($datos);
		echo '</pre>';
	?>

	<a href="index.php?page=panel">Volver</a>
</body>
</html>