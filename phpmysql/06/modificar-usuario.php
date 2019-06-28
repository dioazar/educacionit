<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:?page=404');
	}

	if(isset($_GET['rta']))
		echo MostrarMensaje( $_GET["rta"] );

	$myUsuario = getUsuario($id);

	editarUsuario($_POST);
?>

<h1>Editar usuario</h1>
<form action="" method="post">
	<label>Nombre</label>
	<input type="text" name="nombre" value="<?php echo $myUsuario['nombre'] ?>">
	<br>

	<label>Apellido</label>
	<input type="text" name="apellido" value="<?php echo $myUsuario['apellido'] ?>">
	<br>

	<label>Email</label>
	<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" value="<?php echo $myUsuario['email'] ?>">
	<br>
	<input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
	<input type="submit" value="Editar">
</form>