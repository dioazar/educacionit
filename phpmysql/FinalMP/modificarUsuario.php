<?php
	//nos llega el id.
	//buscamos al usuario por id
	//mostramos los datos del usuario en el formulario
	//nos fijamos que exista el mail
	//Generamos el update
	//me diga un mensaje

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$usuario = getUsuarioById($id);
	}else{
		die();
	}
//ini_set()
	if(isset($_POST['nombre']))
	{
		$nombre   = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email    = $_POST['email'];

		modificarUsuario($nombre, $apellido, $email, $id);
	}
?>

<h1>Modificar usuario</h1>

<form action="" method="POST">
	<input type="text" name="nombre" value="<?php echo $usuario['Nombre']; ?>">
	<br>
	<input type="text" name="apellido" value="<?php echo $usuario['Apellido']; ?>">
	<br>
	<input type="email" name="email" value="<?php echo $usuario['Email']; ?>">
	<br>
	<input type="submit" value="modificar">
</form>