<?php 
/* 
id por get
array usuario, mostrar datos
agarrar datos post
comparar new pass 1 y new pass 2
vamos a funciones y la modificamos

*/
if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$usuario = getUsuarioById($id);
	}else{
		die();
	}

	if(isset($_POST['passwordActual']))
	{
		$passwordActual   = $_POST['passwordActual'];
		$newPass1 = $_POST['newPass1'];
		$newPass2    = $_POST['newPass2'];
		if($newPass1 == $newPass2){
			modificarPassword($passwordActual, $newPass1, $id);
		}else{
			echo 'Las contraseñas no coinciden.';
		}
	}
?>

<h1>Modificar contraseña de <?php echo $usuario['Nombre']; ?></h1>

<form action="" method="POST">
	<input type="password" name="passwordActual" placeholder="Contraseña actual">
	<br>
	<input type="password" name="newPass1" placeholder="Ingresar nueva contraseña">
	<br>
	<input type="password" name="newPass2" placeholder="Ingresar de nuevo">
	<br>
	<input type="submit">
	
</form>