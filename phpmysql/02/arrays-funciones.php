<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones con arrays</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Funciones con arrays</h1>
		<p>Todas las funciones de arrays se pueden encontrar encontrar en este <a href="http://php.net/manual/es/ref.array.php">link</a> (manual oficial de PHP)</p>
		<?php
		for($i = 3; $i <= 10; $i++) {
			echo $i;
		}die();
	        //Range() genera un array dentro de un rango determinado
			echo '<h5>Utilizando range() para generar un rango del 1 al 10</h5>';
            $numeros = range(1, 10);
            foreach($numeros as $valor){
                echo $valor.'<br>';
            }

            echo '<h5>Utilizando range() para generar un rango alfabetico a-z</h5>';
            $letras = range('a', 'z');
            foreach($letras as $valor){
                echo $valor.', ';
            }

			//array_unshift() inserta elementos al principio del array
			echo '<hr>';
			echo '<h5>Utilizando array_unshift()</h5>';
            $capitales = array('Paris', 'Buenos Aires', 'Madrid', 'Montevideo', 'Brasilia');
			array_unshift($capitales, 'Lima', 'La paz');
			echo '<pre>'; 
			print_r( $capitales ); // Lima, La paz, Paris, Buenos Aires, Madrid, Montevideo, Brasilia
			echo '</pre>'; 

			//array_push()	inserta elementos al final del array
			echo '<h5>array_push()</h5>';
			$capitales = array('Paris', 'Buenos Aires', 'Madrid', 'Montevideo', 'Brasilia');
			array_push($capitales, 'Lima', 'La paz');
			echo '<pre>'; 
			print_r( $capitales ); //Paris, Buenos Aires, Madrid, Montevideo, Brasilia, Lima, La paz
			echo '</pre>'; 

			//array_shif() remueve el primer elemento del array (puedo guardarlo en una variable el elemento que removí)
			echo '<h5>array_shif()</h5>';
			$capitales = array('Paris', 'Buenos Aires', 'Madrid', 'Montevideo', 'Brasilia');
			$resu = array_shift($capitales);
			echo '<pre>';
			print_r( $capitales );//Buenos Aires, Madrid, Montevideo, Brasilia
			echo '</pre>'; 
			echo 'Elemento removido: '.$resu;//Paris

			//array_pop() remueve el último elemento del array (puedo guardarlo en una variable el elemento que removí)
			echo '<h5>array_pop()</h5>';
			$capitales = array('Paris', 'Buenos Aires', 'Madrid', 'Montevideo', 'Brasilia');
			$resu = array_pop($capitales);
			echo '<pre>';
			print_r( $capitales );//Paris, Buenos Aires, Madrid, Montevideo
			echo '</pre>'; 
			echo 'Elemento removido: '.$resu;//Brasilia

			//in_array() busca valor dentro del array
			echo '<h5>in_array()</h5>';
			$capitales = array('Paris', 'Buenos Aires', 'Madrid', 'Montevideo', 'Brasilia');
			if (  in_array('Buenos Aires', $capitales) ) //solo devuelve true/false
			{
			        echo 'Valor encontrado';
			}

			//array_key_exists() busca por clave (key) dentro del array
			echo '<h5>array_key_exists()</h5>';
			$edades = array( 'Juan' => 28, 'Carlos' => 16, 'Maria' => 35, 'Raquel' => 46, 'Graciela' => 34 );
			$buscar = 'Raquel';
			if (array_key_exists($buscar, $edades)){
			        echo 'La edad de '.$buscar.' es '.$edades[$buscar];
			} else {
			        echo $buscar.' no se encuentra en el listado';
			}

			//array_search() busca un valor específico y devuelve el índice en el que se encuentra o false si no lo encuentra
			echo '<h5>array_search()</h5>';
			$edades = array( 'Juan' => 28, 'Carlos' => 16, 'Maria' => 35, 'Raquel' => 46, 'Graciela' => 34 );
			$buscar = 28;
			$indice = array_search($buscar, $edades);
			if ( $indice ){
			        echo $indice.' esta asociado al valor '.$buscar;
			} else {
			        echo 'No encontramos ningun elemento con el valor '.$buscar;
			}

			//implode() convierte un array en un string
			echo '<h3>implode()</h3>';
			$array = array('Juan', 'Carlos', 'Jose');
			$separado_por_comas = implode(",", $array);

			echo $separado_por_comas; // Juan,Carlos,Jose

			//explode() convierte un string en un array a partir de un delimitador
			echo '<h3>explode()</h3>';
			$str = 'Juan|Carlos|Jose';
			$arrayConExplode = explode('|', $str);
			echo '<pre>';
			print_r($arrayConExplode);
			echo '</pre>';


			echo '<h3>Ordenamiento</h3>';


			//array_reverse() invierte el orden del array
			echo '<h5>array_reverse()</h5>';
			$reversed = array_reverse($arrayConExplode);
			echo '<pre>';
			print_r($reversed);
			echo '</pre>';

			//array_flip() invierte los roles de las claves y los valores
			echo '<h5>array_flip()</h5>';
			$state = array_flip($reversed);
			echo '<pre>';
			print_r($state);
			echo '</pre>';

			//sort() ordena por orden alfabetico
			echo '<h5>sort()</h5>';
			$personas[11] = 'Ivan';
	        $personas[16] = 'Miguel';
	        $personas[15] = 'Ricardo';
	        $personas[20] = 'Fabian';
	        $personas[40] = 'Lorena';
	        $personas[33] = 'Veronica';
	        $personas[17] = 'Eduardo';
	        $personas[93] = 'Amalia';
	        sort($personas);
	        foreach($personas as $pos=>$nombre){
	                echo $nombre.' tiene la posicion '.$pos.'<br>';
	        }

			//asort() ordena un arreglo asociativo y mantiene la asociación de índices.
			echo '<h5>asort()</h5>';
			$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
			asort($fruits);
			foreach ($fruits as $key => $val) {
			    echo "$key = $val\n";
			}

		?>
		<hr>
		<a href="arrays.php">Arrays básicos</a>
		<br>
		<a href="arrays-multidimensionales.php">Arrays multidimensionales</a>
	</div>
</body>
</html>