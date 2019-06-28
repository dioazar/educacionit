<?php
	blockPage();

	$limite = 10;
	$pagina = 1;

	if(isset($_POST['b']))
	{
		$busqueda = $_POST['b'];
		$productos = searchProducto($busqueda);
	}else{
		if(isset($_GET['p']))
		{
			$pagina = $_GET['p'];
			$productos = getAllProductsPaginados($pagina, $limite);
		}else{
			//$productos = getAllProductos();
			$productos = getAllProductsPaginados(1, $limite);
		}
	}
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

<ul id="paginador">
<?php 

$paginas = getPaginasProductos($limite); 

if($pagina != 1){
	$anterior = $pagina - 1;
	echo '<li><a href="?page=productos&p='.$anterior.'">Anterior</a></li>';
}

for ($i=1; $i <= $paginas; $i++) { 
	if($i == $pagina)
		$style = 'style="background-color:#1E631F"';
	else
		$style = '';
	echo '<li '.$style.'><a href="?page=productos&p='.$i.'">'.$i.'</a></li>';
}

if($pagina != $paginas)
{
	$siguiente = $pagina + 1;
	echo '<li><a href="?page=productos&p='.$siguiente.'">Siguiente</a></li>';
}
?>
</ul>

<a href="?page=marcas">Marcas</a>
<br>
<a href="?page=categorias">Categorias</a>