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
		<?php
	        //A cada posición del array se le peude meter otro array, a eso lo llamamos array multidimensional
			$alumnos_aula0 =array(
									  'Juan' => 22
									, 'Martin' => 18
									, 'Ignacio' => 21
								);

            $alumnos_aula1 =array(
            						  'Carlos' => 52
            						, 'Roberto' => 55
            						, 'Horacio' => 49
            					);
            //pongo los dos arrays dentro de un array
            $todos = array( $alumnos_aula0, $alumnos_aula1 );

            foreach($todos as $indice=>$alumnos)
            {
                    echo '<p>Imprimiendo alumnos del aula '.$indice.'<p>';
                    echo '<ul>';
                    //como cada elemento del array $todos A SU VEZ es un array, puedo recorrerlo con otro foreach!
                    foreach($alumnos as $nombre=>$edad)
                    {
                            echo '<li>'.$nombre.' ('.$edad.')</li>';
                    }
                    echo '</ul>';
            }
		?>
		<a href="arrays.php">Arrays básicos</a>
		<br>
		<a href="arrays-funciones.php">Funciones</a>
	</div>
</body>
</html>