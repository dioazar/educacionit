<?php require_once 'share/header.php' ?>
<?php 
	require 'clases/class.users.php';

	$id = $_GET['id'];

	$usuario = new Users();
	$usuario->getUsuarioById($id);	

	if(isset($_POST['nombre'])){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];

		$response = $usuario->editar($nombre, $apellido, $email, $id);

		//if($response->cod_mensaje == -1)
		echo '<div class="alert alert-'.$response->class.'" role="alert">'.$response->mensaje.'</div>';
	}	
?>
	<div class="container">
	  	<h3>Modificar usuario</h3>
	  	
	  	<!--form action="javascript:void(0)"-->
	  	<form action="" method="post">
	  		<div class="form-group">
	  			<label>Nombre</label>
	  			<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
	  		</div>
	  		<div class="form-group">
	  			<label>Apellido</label>
	  			<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario->apellido; ?>">
	  		</div>
	  		<div class="form-group">
			    <label>Email</label>
			    <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario->email; ?>">
			</div>
			<input type="hidden" id="idEnc" name="idEnc" value="<?php echo $id; ?>">
			<div class="form-group">
				<!--button type="button" class="btn btn-primary" onclick="editarUsuario()">Modificar</button-->
				<input type="submit" name="">
			</div>
	  	</form>

	</div>

<?php require_once 'share/footer.php' ?>
<script src="scripts/modificar-usuario.js"></script>