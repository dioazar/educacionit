<?php 
	require 'conection.php';
	require 'header.php';
	// 1. Abrimos conexión a la base de datos
	// 2. Preparamos nuestra query
	// 3. (opcional) metemos las variables en la query
	// 4. Ejecutamos la consulta
	// 5. Leemos el resultado
 	/*echo '<pre>';
 	print_r($_SERVER);
 	echo '</pre>';*/

	/*var_dump($conn);
	$id_categoria = 3;
	
	$query = $conn->prepare('SELECT * FROM categorias WHERE idCategoria = :id_cat');
	$query->bindParam(":id_cat", $id_categoria, PDO::PARAM_INT);

	if($query->execute())
	{
		while($row = $query->fetch())
		{
			echo '<pre>';
			print_r($row);
			echo '</pre>';
		}
	}*/

	$productos = $conn->prepare("SELECT p.Nombre
									 , p.Precio
								     , m.Nombre 'marca'
								     , c.Nombre 'categoria'
								FROM productos p
								JOIN Marcas m ON p.Marca = m.idMarca
								JOIN categorias c ON p.Marca = c.idCategoria");
	
	$productos->execute();

	echo '<table>';
		echo '<thead>';
			echo '<th>Nombre</th>';
			echo '<th>Precio</th>';
			echo '<th>Categoria</th>';
			echo '<th>Marca</th>';
		echo '</thead>';
		echo '<tbody>';
	while($row = $productos->fetch())
	{
		echo '<tr>';
			echo '<td>'.$row['Nombre'].'</td>';
			echo '<td>'.$row['Precio'].'</td>';
			echo '<td>'.$row['categoria'].'</td>';
			echo '<td>'.$row['marca'].'</td>';
		echo '</tr>';
	}	
		echo '</tbody>';
	echo '</table>';
?>