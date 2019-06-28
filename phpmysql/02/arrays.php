<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Arrays</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Arrays</h1>

		<!-- Formas de declarar arrays -->
		<?php 
			//Declaramos arrays de manera forzada
			$nombres[] = "Dionel";
			$nombres[] = "Jose";
			$nombres[] = "Maria";
			$nombres[] = "Barbara";

			//Podemos también declarar los array con un key específico (y puede no ser secuencial)
			$nombres2[1] = "Dionel";
			$nombres2[5] = "Jose";
			$nombres2[8] = "Maria";
			$nombres2[9] = "Barbara";

			//También existen arrays "asociativos" (se le pueden poner strings en el key)
			$arrayAsociativo['yo'] = "Dionel";
			$arrayAsociativo['amigo'] = "Jose";
			$arrayAsociativo['madre'] = "Maria";
			$arrayAsociativo['novia'] = "Barbara";

			//También se puede declarar automático
			$nombres4 = array('Dionel', 'Jose', 'Maria', 'Barbara' );//empieza desde 0
			$nombres5 = array('yo' => 'Dionel', 'amigo' => 'Jose', 'madre' => 'Maria', 'novia' => 'Bárbara');
			//para leer más cómodo
			$nombres5 = array(
								  'yo' => 'Dionel'
								, 'amigo' => 'Jose'
								, 'madre' => 'Maria'
								, 'novia' => 'Bárbara'
							);

			//así se imprime un array legible
			echo '<h5>Imprimo array con "pre" </h5>';
			echo '<pre>';
			print_r($nombres4);
			echo '</pre>';	


			//Para verificar si una variable es array podemos usar is_array()
			echo '<h5>is_array()</h5>';
			if(is_array($nombres5))
			{
				echo '<p>$La variable es array</p>';
			}else{
				echo '<p>$La variable <strong>no</strong> es array</p>';
			}

			//Para saber la cantidad de elementos que tiene el array podemos usar count()
			echo '<hr>';
			echo '<h5>count() y for</h5>';
			echo '<p>La variable tiene: <strong>'.count($nombres4).'</strong> elementos</p>';
			//Nos sirve también para recorrer con un for	
			for ($i=0; $i < count($nombres); $i++) 
			{ 
				echo '<p>Estoy recorriendo con el for -> '.$nombres[$i].' ($i = '.$i.')</p>';
			}

			//Para recorrer un array no secuencial no podemos usar un for, usamos foreach (se ejecuta la cantidad de veces necesaria para recorrer el array entero)
			echo '<hr>';
			echo '<h5>Foreach()</h5>';
			$socios[115] = 'Jorge';
	        $socios[160] = 'Silvia';
	        $socios[15] = 'Armando';
	        $socios[20] = 'Roberto';
	        $socios[725] = 'Fernanda';
	        $socios[05] = 'Martina';
	        $socios[117] = 'Alejandrina';

	        foreach ($socios as $key => $value) 
	        {
	        	echo '<p>Socios: '.$key.' => '.$value.'</p>';
	        }
	        //Lo mismo pasa para los arrays asociativos
	        echo '<hr>';
	        foreach ($arrayAsociativo as $key => $value) 
	        {
	        	echo '<p>Nombres: '.$key.' => '.$value.'</p>';
	        }

	        /************************************************ Funciones con arrays ******************************************/
	    ?>
		<a href="arrays-funciones.php">Funciones</a>
	    
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>