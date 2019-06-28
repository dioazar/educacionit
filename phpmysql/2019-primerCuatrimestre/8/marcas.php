<?php 
	//Busco todas las marcas
	$marcas = getMarcas();
	
	/*foreach ($marcas as $key => $value) {
		foreach ($value as $k => $v) {
			echo $k.'----->'.$v.'<br>';
		}
	}*/
?>
<h1>Listado de marcas</h1>
<div>
	<a class="acount-btn" href="?page=editMarcas">Crear Marca</a>
</div>
<br>
<table>
	<thead>
		<th>Id</th>
		<th>Marca</th>
		<th>Editar</th>
	</thead>
	<tbody>
		<!-- recorrer todas, mostrar lo qeu hay que mostrar y el editar -->
		<?php foreach ($marcas as $key => $value): ?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['marca']; ?></td>
				<td><a href="?page=editMarcas&id=<?php echo $value['id'] ?>">Editar</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>