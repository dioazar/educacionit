<?php require_once 'share/header.php' ?>
<?php 
require 'clases/class.users.php';
	$miUsuario1 = new Users();
	$miUsuario2 = new Users();

	$miUsuario1->nombre = 'Dionel';

	$array1 = array('valor 1', 'valor 2', 'valor 3');
	$array2 = array('nombre' => 'Dionel', 'apellido' => 'Azar' );
	$array3 = array($miUsuario1, $miUsuario2);


	echo '<pre>';
	print_r($array3[0]);
	echo '</pre>';

	echo $array3[0]->nombre;
?>
<?php require_once 'share/footer.php' ?>
<script type="scripts/pruebas.js"></script>