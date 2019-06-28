<?php require_once 'share/header.php' ?>
<?php 
	if(count($_POST) >= 6)
	{
		$email = $_POST['email'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$dni = $_POST['dni'];
		$edad = $_POST['edad'];
		$pass = $_POST['pass'];

		require 'class.users.php';
		$users = new Users();
		$rta = $users->registro($nombre, $apellido, $email, $pass, $dni, $edad);
		var_dump($rta);
	}
?>
	<div id="msg"></div>

	<div class="container">
	  	<h3>Registro</h3>
	  	
	  	<form action="" method="POST">
			<div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>

			<div class="form-group">
			    <label>Nombre</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Password">
			</div>

			<div class="form-group">
			    <label>Apellido</label>
			    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Password">
			</div>

			<div class="form-group">
			    <label>DNI</label>
			    <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI">
			</div>

			<div class="form-group">
			    <label>Edad</label>
			    <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad">
			</div>

			<div class="form-group">
			    <label>Password</label>
			    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
			</div>

			<!--button type="button" class="btn btn-primary" onclick="registro()">Submit</button-->
			<button type="submit" class="btn btn-primary"">Submit</button>
		</form>

	</div>

<?php require_once 'share/footer.php' ?>
<script src="scripts/registro.js"></script>