<?php 
	$id_producto = isset($_GET['id']) ? $_GET['id'] : 0;
	$misImagenes = getGaleria($id_producto);

echo '<pre>';
print_r($_POST);
echo '</pre>';

	if(isset($_POST['eliminar']))
	{
		$id_imagen = $_POST['id_imagen'];
		$url_imagen = $_POST['url_imagen'];
		$response = borrarImagen($id_imagen, $url_imagen);
		echo $response; 
		unset($_POST);
	}

	if(isset($_POST['subirImagenes']))
	{
		$galeria = $_FILES['imagenes'];
		for ($i=0; $i < count($galeria['name']); $i++) 
		{ 
			cargarImagenGaleria($galeria['name'][$i], $galeria['tmp_name'][$i], $galeria['type'][$i], $id_producto);
		}
		unset($_POST);
	}

	if(isset($_POST['modificar']))
	{
		$id_imagen = $_POST['id_imagen'];
		$url_imagen = $_POST['url_imagen'];
		$new_imagen = $_FILES['nuevaImagen'];
		echo '<pre>';
		print_r($new_imagen);
		echo '</pre>';
		modificarImagenGaleria($id_imagen, $url_imagen, $new_imagen);
		unset($_POST);
	}
?>
<h1>Administrar galería de imagenes</h1>

<?php foreach ($misImagenes as $key => $value): ?>
	<img src="<?php echo UPLOADS_URL . "/" . $value["url_imagen"]; ?>">
	<form action="" method="POST">
		<input type="hidden" name="eliminar">
		<input type="hidden" name="url_imagen" value="<?php echo $value['url_imagen']; ?>" >
		<input type="hidden" name="id_imagen" value="<?php echo $value['id_imagen']; ?>">
		<input type="submit" value="Borrar">
	</form>
	<br>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="modificar">
		<input type="hidden" name="url_imagen" value="<?php echo $value['url_imagen']; ?>" >
		<input type="hidden" name="id_imagen" value="<?php echo $value['id_imagen']; ?>">
		<input type="file" name="nuevaImagen">
		<input type="submit" value="Modificar">
	</form>
	<br>
<?php endforeach ?>

<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="imagenes[]" multiple="">
	<input type="hidden" name="subirImagenes">
	<input type="submit"  value="Cargar nuevas imagenes">
</form>

<a href="?page=producto&action=update&id=<?php echo $id_producto; ?>">Volver</a>