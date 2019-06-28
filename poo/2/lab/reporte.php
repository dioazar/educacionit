<?php

/**
 * @author educacionit
 * @copyright 2008
 */

include("Pelicula.php");
require 'share/header.php';

if(!isset($_COOKIE['usuario']))
	header('location:login.php');

if(!empty($_GET['reserva']))
{
	// reservo la butaca
	$x = new Pelicula($_GET['reserva']);
	
	if($x->reservar()==false)
		echo "<div class='alert alert-warning fade in'>No se pudo reservar</div>";
	else
		echo "<div class='alert alert-success fade in'>Se reservó correctamente!</div>";
}
else if(!empty($_GET['devuelve']))
{
	// devuelvo la butaca
	$x=new Pelicula($_GET['devuelve']);
	
	if($x->devolver()==false)
		echo "<div class='alert alert-warning fade in'>No se pudo devolver</div>";
	else
		echo "<div class='alert alert-success fade in'>Se devolvió correctamente!</div>";

}

$peliculas = new Pelicula();
$stmt = $peliculas->getAllPeliculas();

?>

<div class="container">
	<table class="table table-hover">
		<thead class="thead">
			<tr>
				<td>Codigo</td>
				<td>Titulo</td>
				<td>Genero</td>
				<td>Butacas</td>
				<td>Disponible</td>
				<td>Reservar</td>
				<td>Devolver</td>
			</tr>
		</thead>
		<tbody>
	<?php
	//traigo uno por uno los registros de la query, que en este caso solo
	// contienen un campo (cod_pelicula). Luego intancio un objeto de clase Pelicula y muestro
	//su registro en la tabla 
	while($campos = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$pelicula = new Pelicula($campos['cod_pelicula']);
	?>
			<tr>
				<td><?php echo $pelicula->codigo ?></td>
				<td><?php echo $pelicula->titulo ?></td>
				<td><?php echo $pelicula->genero ?></td>
				<td><?php echo $pelicula->butacas ?></td>
				<td><?php echo $pelicula->disponibles ?></td>
				
				<td><a href="reporte.php?reserva=<?php echo $pelicula->codigo ?>">Reservar</a></td>
				<td><a href="reporte.php?devuelve=<?php echo $pelicula->codigo ?>">Devolver</a></td>		
				
			</tr>
		
	<?php } ?>
		</tbody>
	</table>
</div>

<?php require 'share/footer.php'; ?>