<?php 
require 'funciones.php';

if(isset($_GET['action']))
{
	switch ($_GET['action']) {
		case 'crear':
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$marca_id = $_POST['marca'];
			$categoria_id = $_POST['categoria'];
			$presentacion = $_POST['presentacion'];
			$stock = $_POST['stock'];
			$imagen = $_FILES['imagen'];
			insertProducto($nombre, $precio, $marca_id, $categoria_id, $presentacion, $stock, $imagen );
			break;
		
		case 'update':
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$marca_id = $_POST['marca'];
			$categoria_id = $_POST['categoria'];
			$presentacion = $_POST['presentacion'];
			$stock = $_POST['stock'];
			$imagen = $_FILES['imagen'];
			$imagen_original = $_POST['imagen_original'];
			updateProducto($id, $nombre, $precio, $marca_id, $categoria_id, $presentacion, $stock, $imagen, $imagen_original);
			break;

		case 'delete':
			$id = $_GET['id'];
			deleteProducto($id);
			break;

		case 'search':
			$nombre = $_POST['texto'];
			searchProducto($nombre);
			break;
	}
}
	

?>