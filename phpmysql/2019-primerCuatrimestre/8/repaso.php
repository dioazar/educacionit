<?php 
	function hola($nombre)
	{
		return "Hola ".$nombre;
	}

	$hola = hola('Dio');
	echo $hola;

	$datos = array(		'Nombre' => 'Dio',
						'Apellido' => 'Azar',
						'Edad' => 28,
						'Sexo' => 'Masculino'
							 );
	$datos2 = array(		'Dio',
						'Azar',
						28,
						'Masculino'
							 );
	myPrint($datos2);
	$contador = 0;
	foreach ($datos as $key => $value) {
		echo $key . '------->'.$value.'<br>';
		echo $contador;
		$contador++;
	}

	for ($i=0; $i < count($datos2); $i++) { 
		echo $datos2[$i];
	}
?>