<?php
	comprobarAdmin();

	include_once("conection.php");
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
	if ( isset($_GET["p"]) ) {
		$pagina = $_GET["p"];
	} else {
		$pagina = 1;
	}

	if(isset($_POST['textoBuscar']))
		$misProductosBuscados = buscarProductos($_POST['textoBuscar']);
?>
<h1>Listado de Productos</h1>
<br>
	<form action="" method="post">
		<input type="text" name="textoBuscar">
		<input type="submit" value="BUSCAR">
	</form>
<br>
<a href="?page=producto&amp;action=add" class="now-get">Nuevo producto</a>

<div class="excels">
	<form method="POST" action="importar-excel.php" enctype="multipart/form-data">
		<span>Importar Excel</span>
		<input type="file" name="excel">
		<input type="submit">
	</form>
</div>

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
	<?php 
		if(isset($misProductosBuscados)){
			foreach ($misProductosBuscados as $key => $value) 
			{
				echo '<td>'.$value['nombre'].'</td>';
				echo '<td>'.$value['precio'].'</td>';
				echo '<td>'.$value['marca'].'</td>';
				echo '<td>'.$value['categoria'].'</td>';
				echo '<td>'.$value['presentacion'].'</td>';
				echo '<td>'.$value['stock'].'</td>';
				echo '<td><img src="'.$value['imagen'].'"></td>';
			}
		}else{
			//ListarProductosSinPaginado(); 
			ListarProductos($pagina, 4);
		}
	?>
</table>

<a href="exportar-excel.php">Descargar Excel</a>