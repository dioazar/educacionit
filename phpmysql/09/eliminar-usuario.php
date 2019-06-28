<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:?page=404');
	}

	if(isset($_POST['cancelar']))
		header("location: " . BACK_END_URL . "/?page=lista-usuarios&id=".$id."&rta=0x030");
	else if(isset($_POST['aceptar']))
		eliminarUsuario($id);

	$myUsuario = getUsuario($id);
?>

<h2>Está por eliminar al usuario: </h2>
<h3>"<?php echo $myUsuario['nombre']. ' ' . $myUsuario['apellido'] ?>"</h3>

<br>
<hr>

<h4>Está seguro?</h4>
<form action="" method="post">
	<input type="submit" name="cancelar" value="Cancelar">
	<input type="submit" name="aceptar" value="Aceptar">
</form>
