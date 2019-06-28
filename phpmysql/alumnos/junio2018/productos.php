<?php
	if(isset($_GET['p']))
		$pagina = $_GET['p'];
	else
		$pagina = 1;

	$productos = getAllProductosPaginado($pagina, 2);
	//$productos = getAllProductos();
	//myPrint($productos);
?>

<h1>Listado de productos</h1>
<div>
	<a class="acount-btn" href="?page=form-producto">Crear Producto</a>
</div>
<br>
<table>
	<thead>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Marca</th>
		<th>Categoria</th>
		<th>Presentacion</th>
		<th>Stock</th>
		<th>Editar</th>
	</thead>
	<tbody>
		<?php foreach ($productos as $key => $value): ?>
			<tr>
				<!--td><img src="images/productos/<?php echo $value['imagen']; ?>" height="42" width="42"></td-->
				<td><img src="<?php echo UPLOADS_URL.$value['imagen']; ?>" height="42" width="42"></td>
				<td><?php echo $value['nombre']; ?></td>
				<td><?php echo $value['precio']; ?></td>
				<td><?php echo $value['marca']; ?></td>
				<td><?php echo $value['categoria']; ?></td>
				<td><?php echo $value['presentacion']; ?></td>
				<td><?php echo $value['stock']; ?></td>
				<td><a href="?page=form-producto&action=editar&id=<?php echo $value['id']; ?>">Editar</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<a href="?page=marcas">Marcas</a>
<br>
<a href="?page=categorias">Categorias</a>