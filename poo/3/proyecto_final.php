<?php
require 'share/header.php';
include_once 'Producto.php';
include_once 'Carrito.php';
include_once 'Conexion.php';
$conexion = new Conexion();

if(isset($_SESSION['carrito'])){
	$carrito = unserialize($_SESSION['carrito']);
}else{
	// si no esta abierta la sesion por primera vez crea el objeto ticket
	$carrito = new Carrito;
}

if(!empty($_GET['codigo_agregar'])){
	$x = new Producto($_GET['codigo_agregar'],$conexion->pdo);
	$carrito->agregar($x);
}

if(!empty($_GET['codigo_quitar'])){
	$x = new Producto($_GET['codigo_quitar'],$conexion->pdo);
	$carrito->quitar($x);
}

if(!empty($_GET['codigo_quitar_todo'])){
	$x = new Producto($_GET['codigo_quitar_todo'],$conexion->pdo);
	$cant = $_GET['cant'];
	$carrito->quitarTodo($x, $cant);
}

?>
<div class="container">
	<table width=100% border=2>
	<tr>
		<td valign="top" align="center">
			<h1>Listado Productos</h1>
			<?php include("reporte.php");?>
		</td>
		<td valign="top" align="center">
			<h1>Ticket</h1>
			<table border="1" cellspacing="0">
				<tr>
					<th>C&oacute;digo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			<?php $carrito->imprimir();?>

			</table>
		</td>

	</tr>

	</table>
</div>
<?php
	$_SESSION['carrito'] = serialize($carrito);
?>

<?php require_once 'share/footer.php' ?>