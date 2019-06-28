<?php require_once 'share/header.php' ?>
<?php 
	require 'clases/class.users.php';

	$id = $_GET['id'];

	$usuario = new Users();
	$usuario->getUsuarioById($id);	

	if(isset($_POST['aceptar'])){
		$response = $usuario->eliminar($id);

		//if($response->cod_mensaje == -1)
			echo '<div class="alert alert-'.$response->class.'" role="alert">'.$response->mensaje.'</div>';
	}

	if(isset($_POST['cancelar']))
	{
		header('location:usuarios.php');
	}
?>

<div class="container">
	<h1>Está seguro de eliminar el usuario:</h1>
	<p><?php echo $usuario->nombre. ' ' . $usuario->apellido; ?></p>
	<form action="" method="post">
		<button class="btn btn-danger" name="cancelar">Cancelar</button>
		<button class="btn btn-success" name="aceptar">Aceptar</button>
	</form>	
</div>

<?php require_once 'share/footer.php' ?>