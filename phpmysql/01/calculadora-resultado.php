<?php 
	if(isset($_POST['numero1']))
	{
		$numero1 = $_POST['numero1'];
		$numero2 = $_POST['numero2'];
		$operacion = $_POST['operacion'];
		if($operacion == 'sumar'){
			$resultado = $numero1 + $numero2;
		}else if($operacion == 'restar'){
			$resultado = $numero1 - $numero2;
		}else if($operacion == 'multiplicar'){
			$resultado = $numero1 * $numero2;
		}else if($operacion == 'dividir'){
			$resultado = $numero1 / $numero2;
		}
	}else{
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculadora</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Calculadora</h1>
		</div>
		<h3><?php echo $resultado; ?></h3>

		<a href="calculadora.php">Volver</a>
	</div>
</body>
</html>