<?php 
	if(isset($_FILES['imagen']))
	{
		cargarImagenPerfil($_FILES['imagen']);
	}

	if(isset($_POST['passwordActual'])){
		cambiarPassword($_POST['passwordActual'], $_POST['newPass']);
	}
?>

<h1>Atualizar foto de perfil</h1>

<img src="<?php echo 'images/uploads/'.$_COOKIE['url_imagen']; ?>" style="max-width: 150px; max-height: 150px">
<form action="" enctype="multipart/form-data" method="POST">
	<input type="file" name="imagen" accept="image/*">
	<input type="submit" value="Cargar foto">
</form>

<h1>Actualizar contraseña</h1>
<form action="" method="POST">
	<input type="password" name="passwordActual" placeholder="Contraseña actual">
	<br>
	<input type="password" name="newPass" placeholder="Nueva contraseña">
	<br>
	<input type="submit" name="">
</form>