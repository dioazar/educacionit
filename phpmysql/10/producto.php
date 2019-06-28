<?php
	require("conection.php");

	//Valido que haya una accion a realizar
	if( isset( $_GET["action"] ) ){
		$action = $_GET["action"];
		$id = $_GET["id"];
		$producto = ObtenerProducto( $id );
		$galeria = ObtenerGaleriaProducto($id);
	} else {
		die();
	}
?>
<?php //echo BACK_END_URL.'producto.php?action='.$action ?>
<div class="main">
	<h1><?php echo $producto['Nombre']; ?></h1>
	<h3>Precio: $<?php echo $producto['Precio']; ?></h3>
	<?php 
		foreach ($galeria as $key => $value) {
			echo '<img src="images/uploads/'.$value.'">';
		}
	?>
</div>