<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$myMarca = getMarca($id);
		myPrint($myMarca);
		$action = 'edit';
		$button = "Editar";
	}else{
		$id = '';
		$action = 'new';
		$button = "Crear";
	}


?>
<h1>Marca</h1>
<form method="POST" action="reciveMarcas.php?action=<?php echo $action; ?>">
	<input type="text" name="marca" placeholder="Marca" 
		value="<?php echo isset($myMarca) ? $myMarca['Nombre'] : ''; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="submit" value="<?php echo $button; ?>">
</form>

<?php if (isset($myMarca)): ?>
	<a href="reciveMarcas.php?action=delete&id=<?php echo $id; ?>">
		<button class="btn btn-danger">Eliminar</button>
	</a>
<?php endif ?>
<br>
<a href="?page=marcas">Volver</a>