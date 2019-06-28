<?php 

if( isset( $_GET["action"] ) ){
	include("funciones.php");
	
	$action = $_GET["action"];

	switch ($action) {
		case 'addUser':
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$email = $_POST["email"];
			$pass = $_POST["pass"];

			registrarUsuario($nombre, $apellido, $email, $pass);
		break;

		case 'activeUser':
			$email = $_GET["u"];
			$clave = $_GET["k"];
			activarUsuario($email, $clave);
		break;

		case 'activar':
			$id = $_GET['id'];
			activarUsuarioById($id);
		break;

		case 'desactivar':
			$id = $_GET['id'];
			desactivarUsuarioById($id);
			break;

		case 'eliminar':
			$id = $_GET['id'];
			eliminarUsuario($id);
			break;

		case 'loginUser':
			$email = $_POST["email"];
			$pass = $_POST["pass"];
			iniciarSesion($email, $pass);
		break;
	}
}
?>