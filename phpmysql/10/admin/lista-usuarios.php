<?php 
	comprobarAdmin(); 
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
?>
<h1>Listado de usuarios</h1>

<table>
	<thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Rol</th>
		<th colspan="2">Acciones</th>
	</thead>
	<tbody>
		<?php listarUsuarios(); ?>
	</tbody>
</table>