<!DOCTYPE html>
<html>
<head>
	<title>Bucles</title>
</head>
<body>
	<?php 
		for ($i=0; $i <= 10; $i++) { 
			echo $i;
			echo '<br>';
			if ( $i % 2 ) {
				echo 'par';
			} else {
				echo 'impar';
			}	
		}

		$num = 1;
		while ( $num <= 10 ) {
			echo $num;
			if ($num == 5) {
				break;
			} 
			
			$num++;
		}
		echo '<br>';
		$myArray = array(
						  'nombre' => 'Dionel'
						, 'apellido' => 'Azar'
						, 'Telefono' => 'JA'
						, 'educacion' => 'IT'
						, 'Clase' => 'php'
					);
		//var_dump($myArray);
		echo count($myArray);
		echo $myArray['nombre'];

		$array2 = array('Dionel', 'Azar', 'educacion', 'it');
		var_dump($array2);

		for ($i=0; $i < count($array2); $i++) { 
			echo $array2[$i].'<br>';
		}

		foreach ($myArray as $key => $value) {
			echo $key. ' => '.$value;
		}

	?>
</body>
</html>