<?php 
	require 'funciones.php';

	if(isset($_GET['action']))
	{
		switch ($_GET['action']) {
			case 'edit':
				$id = $_POST['id'];
				$marca = $_POST['marca'];
				updateMarca($id, $marca);
				break;
			
			case 'new':
				$marca = $_POST['marca'];
				createMarca($marca);
				break;

			case 'delete':
				$id = $_GET['id'];
				deleteMarca($id);
				break;
		}
	}
?>