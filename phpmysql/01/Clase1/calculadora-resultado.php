<?php 
	$n1 = $_POST['numero1'];
	$n2 = $_POST['numero2'];
	$op = $_POST['operacion'];

	if ($op == 'sumar') {
		$resultado = $n1 + $n2;
	} else if($op == 'restar'){
		$resultado = $n1 - $n2;
	} else if($op == 'multiplicar'){
		$resultado = $n1 * $n2;
	} else if($op == 'dividir'){
		$resultado = $n1 / $n2;
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resultado</title>
</head>
<body>
	<h2><?php echo $resultado; ?></h2>
	<br>
	<a href="calculadora.php">Volver</a>
</body>
</html>