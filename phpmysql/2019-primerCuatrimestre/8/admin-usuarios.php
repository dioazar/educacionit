<?php 
	blockPage();
	$usuarios = getAllUsers();
	//myPrint($usuarios);
?>
<h1>Admin usuarios</h1>

<table>
	<thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Estado</th>
	</thead>
	<tbody>
		<?php foreach ($usuarios as $key => $value): ?>
			<?php 	//myPrint( $value ) ;
					//echo $value['Nombre'];
			?>
			<tr>
				<td><?php echo $value['Nombre']; ?></td>
				<td><?php echo $value['Apellido']; ?></td>
				<td><?php echo $value['Email']; ?></td>
				<td>
					<!--a href="usuario.php?action=activar&id<?php echo $value['user_id'] ?>">Activar</a-->
					<?php 
						if($value['Estado'] == 0)
							echo '<a href="usuario.php?action=activar&id='.$value['user_id'].'" style="color:green">Activar</a>';
						else
							echo '<a href="usuario.php?action=desactivar&id='.$value['user_id'].'" style="color:red">Desactivar</a>';
					?>
				</td>
				<td><a href="usuario.php?action=eliminar&id=<?php echo $value['user_id']; ?>">Eliminar</a></td>
				<td>Detalle</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>