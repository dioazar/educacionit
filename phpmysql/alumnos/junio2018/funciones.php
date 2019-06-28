<?php 
	//en este archivo voy a almacenar mis funciones
	require_once('constantes.php');
	require 'conection.php';

	/*********************** FUNCIONES VARIAS *******************************/

	function ejemplo($titulo, $contenido)
	{
		$final = '';
		$final .= '<h4>'.$titulo.'</h4>';
		$final .= '<p>'.$contenido.'</p>';
		echo $final;
	}

	function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function format_size($size) 
	{
	    $units = explode(' ', 'B KB MB GB TB PB');
	    $mod = 1024;

	    for ($i = 0; $size > $mod; $i++) {
	        $size /= $mod;
	    }

	    $endIndex = strpos($size, ".")+3;
	    return substr( $size, 0, $endIndex).' '.$units[$i];
	}

	function CargarPagina($pagina)
	{
		$modulo = $pagina . ".php";
		//echo $modulo;
		if ( file_exists( $modulo ) ) {
			require_once( $modulo );
		} else {
			require_once( "404.php" );
		}
		return true;
	}

	function checkEmail($email) {
	   if ( strpos($email, '@') !== false ) {
	      $split = explode('@', $email);
	      return (strpos($split['1'], '.') !== false ? true : false);
	   }
	   else {
	      return false;
	   }
	}

	function MostrarMensaje($cod){

		switch ($cod) {
			case '0x001':
				$mensaje = "El nombre ingresado no es válido";
			break;
			
			case '0x002':
				$mensaje = "El e-mail ingresado no es válido";
			break;

			case '0x003':
				$mensaje = "El mensaje ingresado no es válido";
			break;

			case '0x004':
				$mensaje = "Su consulta ha sido enviada... muchas gracias!";
			break;

			case '0x005':
				$mensaje = "Ocurrio un error, intente de nuevo";
			break;

			case '0x006':
				$mensaje = "Se creo un nuevo producto satisfactoriamente";
			break;

			case '0x007':
				$mensaje = "Error al crear un producto";
			break;

			case '0x008':
				$mensaje = "Se actualizo el producto satisfactoriamente";
			break;

			case '0x009':
				$mensaje = "Error al actualizar el producto";
			break;

			case '0x010':
				$mensaje = "Se elimino el producto satisfactoriamente";
			break;

			case '0x011':
				$mensaje = "Error al eliminar el producto";
			break;

			case '0x012':
				$mensaje = "Error al subir la imagen.";
			break;

			case '0x013':
				$mensaje = "Email ya registrado";
			break;

			case '0x014':
				$mensaje = "Registro correcto! Revise su email para activar su cuenta.";
			break;

			case '0x015':
				$mensaje = "Error en la registración, intente de nuevo";
			break;

			case '0x016':
			case '0x017':
				$mensaje = "Error de activación, intente de nuevo";
			break;

			case '0x018':
				$mensaje = "Su cuenta se ha activado correctamente!";
			break;

			case '0x019':
				$mensaje = "Usuario o contraseña incorrecta";
			break;

			case '0x020':
				$mensaje = "Ingreso exitoso!";
			break;

			case '0x021':
				$mensaje = "Sesión finalizada!";
			break;

			case '0x022':
				$mensaje = "Revise su casilla de e-mail para recuperar su cuenta";
			break;

			case '0x023':
				$mensaje = "Error, e-mail no valido o inexistente";
			break;

			case '0x024':
				$mensaje = "Clave actualizada satisfactoriamente!";
			break;

			case '0x025':
				$mensaje = "Error, contraseña invalida!";
			break;

			case '0x026':
				$mensaje = "Error, no se pudo actualizar su contraseña";
			break;

			case '0x027':
				$mensaje = "El email no está registrado";
			break;

			case '0x028':
				$mensaje = "Login correcto";
			break;

			case '0x029':
				$mensaje = "Login incorrecto";
			break;

			case '0x030':
				$mensaje = "Usuario bloqueado";
			break;

			case '0x031':
				$mensaje = "Producto creado correctamente";
			break;

			case '0x032':
				$mensaje = "Error al crear el producto";
			break;
		}
		return "<p class='rta rta-".$cod."'>".$mensaje."</p>";
	}

	function mostrarMensajeDB($cod_mensaje)
	{
		global $conn;
		$mensaje = $conn->prepare("SELECT * FROM mensajes WHERE cod_mensaje = :cm");
		$mensaje->bindParam(":cm", $cod_mensaje, PDO::PARAM_STR);

		if($mensaje->execute())
		{
			$row = $mensaje->fetch();
			$mensajeDB = $row['mensaje'];
		}
		
		return $mensajeDB;
	}

	function myPrint($arr)
	{
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	/************************* USUARIOS *********************************/

	function registrarUsuario($nombre, $apellido, $email, $pass)
	{
		global $conn;
		$rta = "0x013";
		$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
		$usuario->bindParam(":email", $email, PDO::PARAM_STR);
		$usuario->execute();

		if ( $usuario->rowCount() == 0 ) {

			$hash = password_hash($pass, PASSWORD_DEFAULT);

			$string = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789ª!·$%&/()=?¿*^¨ç_:;\|@#~€¬][}{}]";
			$clave = str_shuffle( $string );
			$clave = md5( $clave );
	
			//$string = randomString();

			$usuario = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, pass, activacion) VALUES (:nombre, :apellido, :email, :pass, :activacion)");
	
			$usuario->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$usuario->bindParam(":apellido", $apellido, PDO::PARAM_STR);
			$usuario->bindParam(":email", $email, PDO::PARAM_STR);
			$usuario->bindParam(":pass", $hash, PDO::PARAM_STR);
			$usuario->bindParam(":activacion", $clave, PDO::PARAM_STR);
				
			if ( $usuario->execute() ) {
				$url_activacion = "usuario.php";
				$url_activacion.= "?u=" . $email;
				$url_activacion.= "&k=" . $clave;
				$url_activacion.= "&action=activeUser";

				$cuerpo = "<h1>Bienvenido a ComercioIT</h1>";
				$cuerpo.= "<br>";
				$cuerpo.= "Nombre: " . $nombre;
				$cuerpo.= "<br>";
				$cuerpo.= "Apellido: " . $apellido;
				$cuerpo.= "<br>";
				$cuerpo.= "Usuario: " . $email;
				$cuerpo.= "<br>";
				$cuerpo.= "<p>Por favor, active su cuenta para operar en la plataforma</p>";
				$cuerpo.= "<a style='background-color:blue;color:white;display:block;padding:10px' href='".$url_activacion."'>ACTIVAR MI CUENTA</a>";

				$cabecera = "From: no-reply@" . $_SERVER["SERVER_NAME"] . "\r\n";
				$cabecera.= "MIME-Version: 1.0" . "\r\n";
				$cabecera.= "Content-Type: text/html; charset=utf-8" . "\r\n";

				//mail( $email, "Alta de nuevo Usuario", $cuerpo, $cabecera );
				echo $cuerpo;
				die();
				$rta = "0x014";
			} else {
				$rta = "0x015";
			}
		}else{
			echo 'El email ya está registrado.';
			die();
		}
		header("location: " . BACK_END_URL . "/?page=registro&rta=" . $rta);
	}

	function activarUsuario($email, $clave)
	{
		global $conn;

		$usuario = $conn->prepare("UPDATE usuarios SET Estado = 1 WHERE Activacion = :clave AND Email = :email");
		$usuario->bindParam(':clave', $clave, PDO::PARAM_STR);
		$usuario->bindParam(':email', $email, PDO::PARAM_STR);
		if($usuario->execute())
		{
			echo 'Usuario activado';
			header('location:index.php');
		}else{
			echo 'Hubo un error';
		}

		/*global $conn;
		$rta = "0x002";
		$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND activacion = :activacion");
		$usuario->bindParam(":email", $email, PDO::PARAM_STR);
		$usuario->bindParam(":activacion", $clave, PDO::PARAM_STR);

		if ( $usuario->execute() ) {
			
			$usuario = $conn->prepare("UPDATE usuarios SET estado = 1 WHERE email = :email");
			$usuario->bindParam(":email", $email, PDO::PARAM_STR);

			if ( $usuario->execute() ) {
				$rta = "0x018";
			} else {
				$rta = "0x017";
			}

		}
		header("location: " . BACK_END_URL . "/?page=ingreso&rta=" . $rta);*/
	}



	function iniciarSesion($email, $pass)
	{
		global $conn;
		
		if(!checkEmail($email))
		{
			$ruta = 'ingreso';
			$rta = "0x002";
		}else{
			$rta = "0x019";

			$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
			$usuario->bindParam(':email', $email, PDO::PARAM_STR);
			if($usuario->execute() && $usuario->rowCount() > 0)
			{
				$usuario = $usuario->fetch();
				//print_r($usuario);
				$passDB = $usuario["Pass"];
				//var_dump(password_verify( $pass, $passDB ));
				//die();
				if($usuario['Estado'] != 1)
				{
					$rta = "0x030";
				}else{
					if(password_verify( $pass, $passDB ))
					{
						$rta = "0x028";
					}else{
						$rta = "0x029";
					}
				}
				

				$ruta = "ingreso";
			}else{
				$ruta = 'ingreso';
				$rta = "0x027";
			}
		}
		header("location: " . BACK_END_URL . "?page=".$ruta."&rta=" . $rta);
	}

	//var_dump($conn);
	function enviarMail($nombre, $email, $mensaje)//entra a la DB
	{
		global $conn;
		
		//if(getEmail($email) == false)
		if(!getEmail($email))
		{
			$query = $conn->prepare("INSERT INTO contactos(nombre, email, texto) VALUES(:nombre, :email, :mensaje)");
			$query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$query->bindParam(":email", $email, PDO::PARAM_STR);
			$query->bindParam(":mensaje", $mensaje, PDO::PARAM_STR);
			if($query->execute())
			{
				var_dump($query->rowCount());
			}else{
				echo 'Hubo un problema en la ejecución de la query';
			}
		}else{
			echo 'Ya existe el email';
		}
		
	}

	function getEmail($email)
	{
		global $conn;

		$query = $conn->prepare("SELECT email FROM contactos WHERE email = :email");
		$query->bindParam(":email", $email, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch();
	}

	function getAllUsers()
	{
		global $conn;

		$query = $conn->prepare("SELECT * FROM usuarios");
		$query->execute();

		$usuarios = array();
		$i = 0;
		while ($row = $query->fetch()) {
			//Para limpiarlo de datos
			$myUser = array(
						'user_id' => $row['idUsuario'],
						'Nombre' => $row['Nombre'],
						'Apellido' => $row['Apellido'],
						'Email' => $row['Email'],
						'Estado' => $row['Estado']
						);
			array_push($usuarios, $myUser);

			//Usando array_push
			//array_push($usuarios, $row);

			//Usando un contador
			//$usuarios[$i] = $row;
			//$i++;
			//$usuarios = $row;
		}
		return $usuarios;
	}

	function activarUsuarioById($id){
		global $conn;

		$usuario = $conn->prepare("UPDATE usuarios SET Estado = 1 WHERE idUsuario = :id");
		$usuario->bindParam(':id', $id, PDO::PARAM_INT);
		if($usuario->execute())
		{
			echo 'Usuario activado';
			header('location:index.php?page=admin-usuarios&rta=0x031');
		}else{
			echo 'Hubo un error';
		}
	}

	function desactivarUsuarioById($id){
		global $conn;

		$usuario = $conn->prepare("UPDATE usuarios SET Estado = 0 WHERE idUsuario = :id");
		$usuario->bindParam(':id', $id, PDO::PARAM_INT);
		if($usuario->execute())
		{
			echo 'Usuario desactivado';
			header('location:index.php?page=admin-usuarios&rta=0x031');
		}else{
			echo 'Hubo un error';
		}
	}

	function eliminarUsuario($id)
	{
		global $conn;

		$usuario = $conn->prepare("DELETE FROM usuarios WHERE idUsuario = :id");
		$usuario->bindParam(':id', $id, PDO::PARAM_INT);
		if($usuario->execute())
		{
			echo 'Usuario borrado';
			header('location:index.php?page=admin-usuarios&rta=0x031');
		}else{
			echo 'Hubo un error';
		}
	}


	/********************** PRODUCTOS *********************************/

	function insertProducto($nombre, $precio, $marca_id, $categoria_id, $presentacion, $stock, $imagen)
	{
		global $conn;

		$rand = generateRandomString(10);
		$extention = pathinfo($imagen['name'],PATHINFO_EXTENSION);
		$img_name = $rand.'.'.$extention;
		$ruta_imagen = UPLOADS.$img_name;
		move_uploaded_file($imagen['tmp_name'], $ruta_imagen);

		$query = $conn->prepare("INSERT INTO productos(Nombre, Precio, Marca, Categoria, Presentacion, Stock, Imagen) 
			   VALUES(:nombre, :precio, :marca, :categoria, :presentacion, :stock, :imagen)");
		$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
		$query->bindParam(':precio', $precio, PDO::PARAM_INT);
		$query->bindParam(':marca', $marca_id, PDO::PARAM_INT);
		$query->bindParam(':categoria', $categoria_id, PDO::PARAM_INT);
		$query->bindParam(':presentacion', $presentacion, PDO::PARAM_STR);
		$query->bindParam(':stock', $stock, PDO::PARAM_INT);
		$query->bindParam(':imagen', $img_name, PDO::PARAM_STR);

		if($query->execute())
		{
			header('location:index.php?page=productos&rta=0x031');
		}else{
			header('location:index.php?page=productos&rta=0x032');
		}
	}

	function getAllProductos()
	{
		global $conn;

		//$query = $conn->prepare("SELECT * FROM productos");
		$query = $conn->prepare("SELECT p.idProducto,
									   p.Nombre,
								       p.Precio,
								       p.Presentacion,
								       p.Stock,
								       p.Imagen,
								       m.Nombre 'Marca',
								       c.Nombre 'Categoria'
								FROM productos p
								JOIN marcas m ON p.Marca = m.idMarca
								JOIN categorias c ON p.Categoria = c.idCategoria");
		$query->execute();

		$productos = array();

		while ( $row = $query->fetch() ) {
			$myProducto = array(
							'id'           => $row['idProducto'],
							'nombre'       => $row['Nombre'],
							'precio'       => $row['Precio'],
							'marca'        => $row['Marca'],
							'categoria'    => $row['Categoria'],
							'presentacion' => $row['Presentacion'],
							'stock'        => $row['Stock'],
							'imagen'       => $row['Imagen'],
								);
			array_push($productos, $myProducto);
			//array_push($productos, $row);
		}

		return $productos;
	}

	function getProducto($id)
	{
		global $conn;

		$query = $conn->prepare("SELECT * FROM productos WHERE idProducto = :id");
		$query->bindParam(":id", $id, PDO::PARAM_INT);
		$query->execute();

		return $query->fetch();
	}

	function searchProducto($nombre)
	{

	}

	function updateProducto($id, $nombre, $precio, $marca_id, $categoria_id, $presentacion, $stock, $imagen, $imagen_original)
	{
		if($imagen['error'] == 0)
		{
			$rand = generateRandomString(10);
			$extention = pathinfo($imagen['name'],PATHINFO_EXTENSION);
			$img_name = $rand.'.'.$extention;
			$ruta_imagen = UPLOADS.$img_name;
			move_uploaded_file($imagen['tmp_name'], $ruta_imagen);
		}else{
			$img_name = $imagen_original;
		}
		
		global $conn;
		$query = $conn->prepare("UPDATE productos SET Nombre = :nombre, Precio = :precio, Marca = :marca, Categoria = :categoria, Presentacion = :presentacion, Stock = :stock, Imagen = :imagen WHERE idProducto = :id");
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
		$query->bindParam(':precio', $precio, PDO::PARAM_INT);
		$query->bindParam(':marca', $marca_id, PDO::PARAM_INT);
		$query->bindParam(':categoria', $categoria_id, PDO::PARAM_INT);
		$query->bindParam(':presentacion', $presentacion, PDO::PARAM_STR);
		$query->bindParam(':stock', $stock, PDO::PARAM_INT);
		$query->bindParam(':imagen', $img_name, PDO::PARAM_STR);

		if($query->execute())
		{
			header('location:index.php?page=productos&rta=0x031');
		}else{
			header('location:index.php?page=productos&rta=0x032');
		}
	}

	function deleteProducto($id)
	{
		global $conn;
		$query = $conn->prepare("DELETE FROM productos WHERE idProducto = :id");
		$query->bindParam(":id", $id, PDO::PARAM_INT);
		if($query->execute())
		{
			header('location:index.php?page=productos&rta=0x031');
		}else{
			header('location:index.php?page=productos&rta=0x032');
		}
	}

	function getCategorias()
	{
		global $conn;

		$query = $conn->prepare("SELECT * FROM categorias");
		$query->execute();
		$categorias = array();

		while( $row = $query->fetch() ){
			$categoria = array( 'id'        => $row['idCategoria'],
								'categoria' => $row['Nombre']
							   );
			array_push($categorias, $categoria);
		}

		return $categorias;
	}

	function getMarcas()
	{
		global $conn;

		$query = $conn->prepare("SELECT * FROM marcas");
		$query->execute();
		$categorias = array();

		while( $row = $query->fetch() ){
			$categoria = array( 'id'        => $row['idMarca'],
								'marca' => $row['Nombre']
							   );
			array_push($categorias, $categoria);
		}

		return $categorias;
	}

	function MostrarPaginador($pagina = 0, $limite = 10)
	{
		global $conn;
		$productos = $conn->prepare("SELECT COUNT(*) FROM productos");
		$productos->execute();
		$total_filas = $productos->fetchColumn();		

		//Empezamos la paginacion desde cero
		$posicion = ($pagina - 1) * $limite;

		//Obtenemos el numero de paginas que vamos a mostrar
		$paginas_total = ceil($total_filas / $limite);
		?>
			<ul id="paginador">
				<?php if ($pagina != 1) : ?>
					<li><a href="<?php echo BACK_END_URL . "?page=productos&p=" . ($pagina - 1); ?>">Anterior</a></li>
				<?php endif; ?>

				<?php 
					for ($i=1; $i <= $paginas_total; $i++) { 
						$href = BACK_END_URL . "?page=productos&p=".$i;
						if ($pagina == $i)
							$style = 'style="background-color:#325E55"';
						else
							$style = "";

						echo "<li ".$style."><a href='".$href."'>".$i."</a></li>\n";
					}
				 ?>
				<?php if ($pagina != $paginas_total) : ?>
					<li><a href="<?php echo BACK_END_URL . "?page=productos&p=" . ($pagina + 1); ?>">Siguiente</a></li>
				<?php endif; ?>
			</ul>
		<?php
	}

	function getAllProductosPaginado($pagina = 0, $limite = 10)
	{
		global $conn;
		$posicion = ($pagina - 1) * $limite;

		$query = $conn->prepare("SELECT p.idProducto,
									   p.Nombre,
								       p.Precio,
								       p.Presentacion,
								       p.Stock,
								       p.Imagen,
								       m.Nombre 'Marca',
								       c.Nombre 'Categoria'
								FROM productos p
								JOIN marcas m ON p.Marca = m.idMarca
								JOIN categorias c ON p.Categoria = c.idCategoria
								LIMIT :posicion, :filas");
		$query->bindParam(":posicion", $posicion, PDO::PARAM_INT);
		$query->bindParam(":filas", $limite, PDO::PARAM_INT);

		$query->execute();

		$productos = array();

		while ( $row = $query->fetch() ) {
			$myProducto = array(
							'id'           => $row['idProducto'],
							'nombre'       => $row['Nombre'],
							'precio'       => $row['Precio'],
							'marca'        => $row['Marca'],
							'categoria'    => $row['Categoria'],
							'presentacion' => $row['Presentacion'],
							'stock'        => $row['Stock'],
							'imagen'       => $row['Imagen'],
								);
			array_push($productos, $myProducto);
		}
		MostrarPaginador($pagina, $limite);

		return $productos;
	}

	/**************************** TAREA **************************************/
	//Hacer un abm/CRUD de categorias
	//Hacer un abm/CRUD de marcas



?>