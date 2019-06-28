<?php 	
	require 'conection.php';

	$sql = "SELECT * FROM users";

	/*
	foreach ($conn->query($sql) as $row) 
	{
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}
	*/

	for ($i=0; $i < 20; $i++) { 
		echo $i. ' ';
		echo $i%3;
		echo '<br>';
	}
?>
	<table>
		<thead>
			<th>Id usuario</th>
			<th>Usuario</th>
			<th>Password</th>
			<th>Nombre</th>
			<th>Apellido</th>
		</thead>
		<tbody>
			<?php foreach ($conn->query($sql) as $row): ?>
				<tr>
					<td><?php echo $row['id_user']; ?></td>
					<td><?php echo $row['txt_user']; ?></td>
					<td><?php echo $row['txt_password']; ?></td>
					<td><?php echo $row['txt_nombre']; ?></td>
					<td><?php echo $row['txt_apellido']; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>