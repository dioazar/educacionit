<?php 
	if(isset($_GET['id']))
		$id = $_GET['id'];
	else
		header('location:?page=abmUsuarios');

	if(isset($_POST['eliminar']))
		eliminarUsuario($id);

	$miUsuario = getUsuarioById($id);
?>

<h1>Estás por eliminar a <?php echo $miUsuario['Nombre'].' '.$miUsuario['Apellido']; ?></h1>
<h3><?php echo $miUsuario['Email']; ?></h3>
<br>
<p>Estás seguro de que querés eliminar al usuario <?php echo $miUsuario['Nombre']; ?>?</p>

<form action="" method="post">
	<input type="hidden" name="eliminar" value="<?php echo $id; ?>">
	<button>Si</button>
</form>

<form action="?page=abmusuarios" method="post">
	<button>No</button>
</form>