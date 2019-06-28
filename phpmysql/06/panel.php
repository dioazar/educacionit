<?php
	include_once("conection.php");
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
	if ( isset($_GET["p"]) ) {
		$pagina = $_GET["p"];
	} else {
		$pagina = 1;
	}
?>
<h1>Listado de Productos</h1>
<a href="?page=producto&amp;action=add" class="now-get">Nuevo producto</a>
<table>
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Marca</th>
		<th>Categoria</th>
		<th>Presentacion</th>
		<th>Stock</th>
		<th colspan="2">Acciones</th>
	</tr>
	<?php //ListarProductosSinPaginado(); ?>
	<?php ListarProductos($pagina, 4); ?>
</table>
