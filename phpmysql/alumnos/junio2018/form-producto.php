<?php 
	if(isset($_GET['action']) && $_GET['action'] == 'editar')
	{
		$action = 'update';
		$id = $_GET['id'];
		$myProduct = getProducto($id);
	}else{
		$action = 'crear';
	}
	//myPrint($myProduct);
	/*echo isset($myProduct) ? $myProduct['Nombre'] : '';
	if(isset($myProduct)){
		$myProduct['Nombre']
	}else{
		''
	}
	*/
	$marcas = getMarcas();
	$categorias = getCategorias();
?>

<div class="register-top-grid">
	<h3>Producto</h3>
	<form action="producto.php?action=<?php echo $action ?>" method="post" enctype="multipart/form-data">
		<div class="mation">
			<span>Nombre: <label>*</label></span>
			<input type="text" name="nombre" value="<?php echo isset($myProduct) ? $myProduct['Nombre'] : ''; ?>"> 
			<span>Precio: <label>*</label></span>
			<input type="number" name="precio" value="<?php echo isset($myProduct) ? $myProduct['Precio'] : ''; ?>"> 
			<span>Marca: <label>*</label></span>
			<select name="marca">
				<option>Elegir</option>
				<?php foreach ($marcas as $key => $value): ?>
					<?php if (isset($myProduct) && $value['id'] == $myProduct['Marca']): ?>
						<option selected value="<?php echo $value['id']; ?>"><?php echo $value['marca']; ?></option>
					<?php else: ?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['marca']; ?></option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
			<span>Categoria: <label>*</label></span>
			<select name="categoria">
				<option>Elegir</option>
				<?php foreach ($categorias as $key => $value): ?>
					<?php if (isset($myProduct) && $myProduct['Categoria'] == $value['id']): ?>
						<option selected value="<?php echo $value['id']; ?>"><?php echo $value['categoria']; ?></option>
					<?php else: ?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['categoria']; ?></option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
			<span>Presentacion: <label>*</label></span>
			<input type="text" name="presentacion" value="<?php echo isset($myProduct) ? $myProduct['Presentacion'] : ''; ?>">
			<span>Stock: <label>*</label></span>
			<input type="number" name="stock" value="<?php echo isset($myProduct) ? $myProduct['Stock'] : ''; ?>">
			<span>Imagen: <label>*</label></span>

			<input type="file" name="imagen" accept="image/x-png,image/gif,image/jpeg">
			<?php if (isset($myProduct)): ?>
				<img src="<?php echo UPLOADS_URL.$myProduct['Imagen']; ?>">
			<?php endif ?>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
			<input type="hidden" name="imagen_original" value="<?php echo isset($myProduct) ? $myProduct['Imagen'] : ''; ?>">
			<div class="register-but">
				<input type="submit" value="Subir" >
			</div>
		</div>
	</form>

	<?php if (isset($myProduct)): ?>
		<a class="acount-btn" style="background-color:#FF4234;" href="producto.php?action=delete&id=<?php echo $id; ?>">Eliminar</a>
	<?php endif ?>
</div>
<div class="clearfix"></div>