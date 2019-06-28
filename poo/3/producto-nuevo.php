<?php require_once 'share/header.php' ?>
<?php 
	require 'clases/class.producto.php';

	$producto = new Producto();
	$marcas = $producto->getMarcas();
	$categorias = $producto->getCategorias();

	if(isset($_POST['nombre']))
	{
		$producto->nombre = $_POST['nombre'];
		$producto->precio = $_POST['precio'];
		$producto->cantidad = $_POST['cantidad'];
		$producto->id_marca = $_POST['marca'];
		$producto->id_categoria = $_POST['categoria'];
		$producto->nuevoProducto();
	}
?>
	<div class="container">
	  	<h3>Nuevo producto</h3>
	  	
	  	<!--form action="javascript:void(0)"-->
	  	<form action="" method="post">
	  		<div class="form-group">
	  			<label>Nombre</label>
	  			<input type="text" class="form-control" id="nombre" name="nombre" value="">
	  		</div>
	  		<div class="form-group">
	  			<label>Precio</label>
	  			<input type="number" class="form-control" id="precio" name="precio" value="">
	  		</div>
	  		<div class="form-group">
			    <label>Cantidad</label>
			    <input type="number" class="form-control" id="cantidad" name="cantidad" value="">
			</div>
			<div class="form-group">
				<label>Marca</label>
				<select class="form-control" name="marca">
					<?php foreach ($marcas as $key => $value): ?>
						<option value="<?php echo $value->id_marca; ?>"><?php echo $value->nombre; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Categoria</label>
				<select class="form-control" name="categoria">
					<?php foreach ($categorias as $key => $value): ?>
						<option value="<?php echo $value->id_categoria; ?>"><?php echo $value->nombre; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<!--button type="button" class="btn btn-primary" onclick="editarUsuario()">Modificar</button-->
				<input type="submit" class="btn btn-primary" name="">
			</div>
	  	</form>

	</div>

<?php require_once 'share/footer.php' ?>
<script src="scripts/modificar-usuario.js"></script>