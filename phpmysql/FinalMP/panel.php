<?php
	comprobarLogin();
	include("conection.php");
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
	if ( isset($_GET["p"]) ) {
		$pagina = $_GET["p"];
	} else {
		$pagina = 1;
	}

	if(isset($_POST['textoBuscado']))
	{
		$texto = $_POST['textoBuscado'];
		$misProductos = buscarProductos($texto);
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
	<?php 
		if(isset($misProductos)){
			foreach ($misProductos as $value) {
			?>
				<tr>
					<td><img style="max-width:100px" src="<?php echo UPLOADS_URL . "/" . $value["Imagen"]; ?>"></td>
					<td><?php echo $value["Nombre"]; ?></td>
					<td>$<?php echo $value["Precio"]; ?></td>
					<td><?php echo $value["Marca"]; ?></td>
					<td><?php echo $value["Categoria"]; ?></td>
					<td><?php echo $value["Presentacion"]; ?></td>
					<td><?php echo $value["Stock"]; ?></td>
					<td> 
						<a href="?page=producto&amp;action=update&amp;id=<?php echo $value["idProducto"]; ?>">Modificar</a>
					</td>
					<td>
						<a href="?page=producto&amp;action=delete&amp;id=<?php echo $value["idProducto"]; ?>">Eliminar</a>
					</td>
				</tr>
			<?php
			}
		}else{
			ListarProductos($pagina, 5); 
		}
	?>
</table>
