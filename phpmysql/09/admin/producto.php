<?php
	comprobarAdmin();
	require("conection.php");

	//Valido que haya una accion a realizar
	if( isset( $_GET["action"] ) ){
		$action = $_GET["action"];
	} else {
		$action = "add";
	}

	//Valido que tipo de peticion invoca al modulo
	if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		//Aca se deben procesar los datos del formulario ejecutado
		require_once("constantes.php");
		require_once("funciones.php");

		switch ($action) {
			case 'add':
				$nombre = $_POST["nombre"];
				$precio =  $_POST["precio"];
				$marca =  $_POST["marca"];
				$categoria =  $_POST["categoria"];
				$presentacion =  $_POST["presentacion"];
				$stock =  $_POST["stock"];
				$imagen = $_FILES["imagen"];
				
				CrearProducto($nombre, $precio, $marca, $categoria, $presentacion, $stock, $imagen);
			break;
			
			case 'update':
				$id = $_POST["id"];
				$nombre = $_POST["nombre"];
				$precio =  $_POST["precio"];
				$marca =  $_POST["marca"];
				$categoria =  $_POST["categoria"];
				$presentacion =  $_POST["presentacion"];
				$stock =  $_POST["stock"];

				$imagen = $_FILES["imagen"];
				$imagenActual = $_POST["imagenActual"];
				
				ActualizarProducto($id, $nombre, $precio, $marca, $categoria, $presentacion, $stock, $imagen, $imagenActual);
			break;
			
			case 'delete':
				$id = $_POST["id"];
				$imagenActual = $_POST["imagenActual"];
				BorrarProducto($id, $imagenActual);
			break;
		}

	} else {
		//Preparar el formulario para: Agregar - Modificar - Eliminar

		switch ($action) {
			case 'add':
				$btn = "Agregar";
				$status = null;
				$producto = ObtenerProducto();
			break;
			
			case 'update':
				$id = $_GET["id"];
				$btn = "Actualizar";
				$status = null;
				$producto = ObtenerProducto( $id );
			break;

			case 'delete':
				$id = $_GET["id"];
				$btn = "Eliminar";
				$status = "disabled";
				$producto = ObtenerProducto( $id );
			break;

			case 'see':
				$id = $_GET["id"];
				$btn = "Comprar";
				$status = null;
				$producto = ObtenerProducto( $id );
				break;
		}
	}
?>
<?php //echo BACK_END_URL.'producto.php?action='.$action ?>
<div class="main">
	<form action="?page=producto&action=<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		Nombre:
		<br>
		<input type="text" name="nombre" value="<?php echo $producto["Nombre"]; ?>" <?php echo $status; ?>>
		<br>

		Precio:
		<br>
		<input type="text" name="precio" value="<?php echo $producto["Precio"]; ?>" <?php echo $status; ?>>
		<br>

		Marca:
		<br>
		<select name="marca" <?php echo $status; ?>>
			<option>Elija una marca...</option>
			<?php
				$marcas = getMarcas();

				$data = @unserialize($marcas);
				if ($marcas === 'b:0;' || $data !== false)
				    $marcas = unserialize($marcas);

				foreach ($marcas as $key => $value)
				{
					echo '<option value="'.$value['id_marca'].'">'.$value['nombre'].'</option>';
				}
			?>
		</select>
		<br>

		Categoria:
		<br>
		<select name="categoria" <?php echo $status; ?>>
			<option>Elija una categoria...</option>
			<?php
				$categorias = getCategorias();
				foreach ($categorias as $key => $value) 
				{
					echo '<option value="'.$value['idCategoria'].'">'.$value['Nombre'].'</option>';
				}
			?>
		</select>
		<br>

		Presentacion:
		<br>
		<input type="text" name="presentacion" value="<?php echo $producto["Presentacion"]; ?>" <?php echo $status; ?>>
		<br>

		Stock:
		<br>
		<input type="text" name="stock" value="<?php echo $producto["Stock"]; ?>" <?php echo $status; ?>>
		<br>
	<?php if( !empty( $producto["Imagen"] ) ) : ?>
		<br>
		<div style="width:100px">
			<img src="<?php echo UPLOADS_URL . "/" . $producto["Imagen"]; ?>" style="max-width:100%">
		</div>
		<br>
	<?php endif; ?>
		Imagen:
		<br>
		<input type="file" name="imagen">
		<br>
		<br>
		<input type="submit" value="<?php echo $btn; ?>">
	<?php if( isset($id) ){ ?>
		<input type="hidden" name="id" value="<?php echo $producto["idProducto"]; ?>">
		<input type="hidden" name="imagenActual" value="<?php echo $producto["Imagen"]; ?>">
	<?php } ?>
	</form>

	<a href="?page=marcas&action=add">Agregar Marca</a>
	<br>
	<a href="?page=categorias&action=add">Agregar Categoria</a>
</div>