<?php 
	require 'PHPExcel/Classes/PHPExcel.php';
	require 'conection.php';

	function getProductos()
	{
		global $conn;

		$stmt = $conn->prepare("SELECT * FROM productos");

		if($stmt->execute())
		{
			$misProductos = array();
			$i = 0;

			while ( $row = $stmt->fetch() )
			{
				$misProductos[$i] = $row;
				$i++;
			}

			return excelProductos($misProductos);
		}
	}

	function excelProductos($data)
	{
		$rString = generateRandomString();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()
		   ->setCreator("Dionel Azar")
		   ->setLastModifiedBy("fecha")
		   ->setTitle("Productos")
		   ->setSubject("Productos")
		   ->setDescription("Productos")
		   ->setKeywords("Productos");

	    $objPHPExcel->setActiveSheetIndex(0);

	    $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Mis productos");

		$objPHPExcel->getActiveSheet()->SetCellValue('A3', "Nombre");
		$objPHPExcel->getActiveSheet()->SetCellValue('B3', "Precio");

	    $i = 4;
	    foreach ($data as $key => $value) 
	    {
	    	$id_producto = $value['idProducto'];
	    	$nombre = $value['Nombre'];
	    	$precio = $value['Precio'];

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, "$nombre");
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, "$precio");
			$i++;
	    }

	    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	    $objPHPExcel->getActiveSheet()
			        ->getStyle('A3:B3')
			        ->getFill()
			        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			        ->getStartColor()
			        ->setRGB('ADADAD');

		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
		$writer->save(__DIR__.'/excels/'.$rString.'.xls');

		return $rString.'.xls';
	}

	function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Descargar Excel</title>
</head>
<body>
	<a href="excels/<?php echo getProductos() ?>" download>Descargar Excel</a>

	<br>

	<a href="index.php?page=panel">Volver</a>
</body>
</html>