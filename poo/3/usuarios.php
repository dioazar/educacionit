<?php require_once 'share/header.php' ?>
<?php 
	require 'clases/class.users.php';

	$users = new Users();
	$usuarios = $users->getUsuarios();
?>
	<div class="container">
	  	<h3>Usuarios</h3>
	  	
	  	<table class="table">
	  		<thead>
	  			<th>Nombre</th>
		  		<th>Apellido</th>
		  		<th>Email</th>
		  		<th>Modificar</th>
		  		<th>Eliminar</th>
	  		</thead>
	  		<tbody>
	  			<?php foreach ($usuarios as $key => $value): ?>
	  				<tr>
	  					<td><?php echo $value->nombre ?></td>
	  					<td><?php echo $value->apellido ?></td>
	  					<td><?php echo $value->email ?></td>
	  					<td><a href="modificar-usuario.php?id=<?php echo urlencode($value->id_usuario); ?>">Modificar</a></td>
	  					<td><a href="eliminar-usuario.php?id=<?php echo urlencode($value->id_usuario); ?>">Eliminar</a></td>
	  				</tr>
	  			<?php endforeach ?>
	  		</tbody>
	  		
	  	</table>

	</div>

<?php require_once 'share/footer.php' ?>
<script src="scripts/login.js"></script>