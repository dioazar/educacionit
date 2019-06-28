<?php require_once 'share/header.php' ?>
<?php 
	require 'clases/class.producto.php';

	$productos = new Producto();
	$misProductos = $productos->getProductos();
?>
	<div class="container">
	  	<h3>Productos</h3>

	  	<a href="producto-nuevo.php"><button class="btn btn-primary">Nuevo producto</button></a>

	  	<table class="table">
	  		<thead>
	  			<th>Nombre</th>
		  		<th>Precio</th>
		  		<th>Cantidad</th>
		  		<th>Modificar</th>
		  		<th>Eliminar</th>
	  		</thead>
	  		<tbody>
	  			<?php foreach ($misProductos as $key => $value): ?>
	  				<tr>
	  					<td><?php echo $value->nombre ?></td>
	  					<td><?php echo $value->precio ?></td>
	  					<td><?php echo $value->cantidad ?></td>
	  					<td><a href="modificar-usuario.php?id=<?php echo urlencode($value->codigo); ?>">Modificar</a></td>
	  					<td><a href="eliminar-usuario.php?id=<?php echo urlencode($value->codigo); ?>">Eliminar</a></td>
	  				</tr>
	  			<?php endforeach ?>
	  		</tbody>
	  		
	  	</table>

	</div>

<?php require_once 'share/footer.php' ?>