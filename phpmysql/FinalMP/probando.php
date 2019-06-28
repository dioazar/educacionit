<?php 
	require 'conection.php'; 

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container">
		<table class="table">
			<thead>
				<th>id_usuario</th>
				<th>nombre</th>
				<th>apellido</th>
				<th>email</th>
				<th>pass</th>
				<th>activacion</th>
				<th>estado</th>
			</thead>
			<tbody>
				<?php $sql = "SELECT * FROM usuarios"; ?>
				<?php foreach ($conn->query($sql) as $row): ?>
					<tr>
						<td><?php echo $row['id_usuario'] ?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['apellido'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['pass'] ?></td>
						<td><?php echo $row['activacion'] ?></td>
						<td><?php echo $row['estado'] ?></td>
					</tr>
				<?php endforeach ?>
				<?php
				/*
				$sql = "SELECT * FROM usuarios";
				foreach ($conn->query($sql) as $row)
				{
					//echo '<pre>';
					//print_r($row);
					//echo '</pre>';
					echo '<tr>';
						echo '<td>'.$row['id_usuario'].'</td>';
						echo '<td>'.$row['nombre'].'</td>';
						echo '<td>'.$row['apellido'].'</td>';
						echo '<td>'.$row['email'].'</td>';
						echo '<td>'.$row['pass'].'</td>';
						echo '<td>'.$row['activacion'].'</td>';
						echo '<td>'.$row['estado'].'</td>';
					echo '</tr>';
				}
				*/
			?>
			</tbody>
		</table>

		<?php 
			//require 'funciones.php';
			//echo mostrarMensajeDB('0x010');
		?>
	</div>
</body>
</html>

