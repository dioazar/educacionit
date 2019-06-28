<!DOCTYPE html>
<html>
<head>
	<title>Clase 1</title>
</head>
<body>
	<?php 
		$variable1 = 1;
		$variable2 = 10;
		$hellowolrd = '¡Hello world!';

		//echo $hellowolrd; //mostrar en html
		//print_r($array);
		var_dump($hellowolrd);//mostrar con tipo de dato

		/*
		voy a meter un 
		comentario
		en varias lineas
		*/

		echo '<br>';

		$resultado = $variable1 + $variable2;
		echo $resultado;

		$hello = 'Hello';
		$world = 'World';
		echo '<br>';
		$helw = '<h3>'.$hello . ' <strong>' . $world.'</strong></h3>';
		echo $helw;
	?>
</body>
</html>