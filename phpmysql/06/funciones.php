<?php 
	//en este archivo voy a almacenar mis funciones
	require_once('constantes.php');
	require 'conection.php';

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
		
		return '<p class="rta rta-'.$cod_mensaje.'">'.$mensajeDB.'</p>';
	}

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
		}
		header("location: " . BACK_END_URL . "/?page=registro&rta=" . $rta);
	}

	function activarUsuario($email, $clave)
	{
		global $conn;
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
		header("location: " . BACK_END_URL . "/?page=ingreso&rta=" . $rta);
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
			$ruta = "ingreso";

			$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
			$usuario->bindParam(':email', $email, PDO::PARAM_STR);
			if ( $usuario->execute() && $usuario->rowCount() > 0 ) {
				$usuario = $usuario->fetch();

				if (password_verify($pass, $usuario["Pass"])) {
					/*session_start();
					$_SESSION["Usuario"] = array(
						"Nombre" => $usuario["Nombre"],
						"Apellido" => $usuario["Apellido"],
						"Email" => $usuario["Email"]
					);*/
					$rta = "0x020";
					$ruta = "panel";
				}
			}
		}
		header("location: " . BACK_END_URL . "?page=".$ruta."&rta=" . $rta);
	}

	function ListarProductosSinPaginado()
	{
		global $conn;

		$productos = $conn->prepare("SELECT * FROM Productos");
		$productos->execute();
		while ( $producto = $productos->fetch() ) 
		{
		?>
			<tr>
				<td><img style="max-width:100px" src="<?php echo UPLOADS_URL . "/" . $producto["Imagen"]; ?>"></td>
				<td><?php echo $producto["Nombre"]; ?></td>
				<td>$<?php echo $producto["Precio"]; ?></td>
				<td><?php echo $producto["Marca"]; ?></td>
				<td><?php echo $producto["Categoria"]; ?></td>
				<td><?php echo $producto["Presentacion"]; ?></td>
				<td><?php echo $producto["Stock"]; ?></td>
				<td>
					<a href="?page=producto&amp;action=update&amp;id=<?php echo $producto["idProducto"]; ?>">Modificar</a>
				</td>
				<td>
					<a href="?page=producto&amp;action=delete&amp;id=<?php echo $producto["idProducto"]; ?>">Eliminar</a>
				</td>
			</tr>
		<?php
		}
	}

	function ListarProductos($pagina = 0, $limite = 10)
	{
		global $conn;
		$posicion = ($pagina - 1) * $limite;
		
		$productos = $conn->prepare("SELECT P.idProducto, P.Nombre, P.Precio, P.Presentacion, P.Stock, P.Imagen, M.Nombre AS Marca, C.Nombre AS Categoria FROM productos AS P INNER JOIN marcas AS M ON P.Marca = M.idMarca INNER JOIN categorias AS C ON P.Categoria = C.idCategoria LIMIT :posicion, :filas");
		$productos->bindParam(":posicion", $posicion, PDO::PARAM_INT);
		$productos->bindParam(":filas", $limite, PDO::PARAM_INT);
		$productos->execute();
		while ( $producto = $productos->fetch() ) {
		?>
		<tr>
			<td><img style="max-width:100px" src="<?php echo UPLOADS_URL . "/" . $producto["Imagen"]; ?>"></td>
			<td><?php echo $producto["Nombre"]; ?></td>
			<td>$<?php echo $producto["Precio"]; ?></td>
			<td><?php echo $producto["Marca"]; ?></td>
			<td><?php echo $producto["Categoria"]; ?></td>
			<td><?php echo $producto["Presentacion"]; ?></td>
			<td><?php echo $producto["Stock"]; ?></td>
			<td>
				<a href="?page=producto&amp;action=update&amp;id=<?php echo $producto["idProducto"]; ?>">Modificar</a>
			</td>
			<td>
				<a href="?page=producto&amp;action=delete&amp;id=<?php echo $producto["idProducto"]; ?>">Eliminar</a>
			</td>
		</tr>
		<?php
		}
		MostrarPaginador($pagina, $limite);
	}

	function ListarProductosInvitado()
	{
		global $conn;

		$productos = $conn->prepare("SELECT * FROM Productos");
		$productos->execute();
		$i = 0;

		while ( $producto = $productos->fetch() ) 
		{
			?>
				<div class="col-sm-4 col-md-4 chain-grid">
					<a href="?page=producto"><img class="img-responsive chain" src="<?php echo UPLOADS_URL . "/" . $producto["Imagen"]; ?>" alt=" " /></a>
					<div class="grid-chain-bottom">
						<h6><a href="?page=producto&action=see&id=<?php echo $producto["idProducto"]; ?>"><?php echo $producto["Nombre"]; ?></a></h6>
						<div class="star-price">
							<div class="dolor-grid"> 
								<span class="actual">$<?php echo $producto["Precio"]; ?></span>
							</div>
							<a class="now-get get-cart" href="?page=producto&action=see&id=<?php echo $producto["idProducto"]; ?>">VER MÁS</a> 
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<?php 
		}
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
					<li><a href="<?php echo BACK_END_URL . "?page=panel&p=" . ($pagina - 1); ?>">Anterior</a></li>
				<?php endif; ?>

				<?php 
					for ($i=1; $i <= $paginas_total; $i++) { 
						
						if ($pagina == $i) {
							$href = "#";
						} else {
							$href = BACK_END_URL . "/?page=panel&p=".$i;
						}
						echo "<li><a href='".$href."'>".$i."</a></li>\n";
					}
				 ?>
				<?php if ($pagina != $paginas_total) : ?>
					<li><a href="<?php echo BACK_END_URL . "/?page=panel&p=" . ($pagina + 1); ?>">Siguiente</a></li>
				<?php endif; ?>
			</ul>
		<?php
	}

	function ObtenerProducto($id = 0)
	{
		$producto = array(
			"idProducto" => "",
			"Nombre" => "",
			"Precio" => "",
			"Marca" => "",
			"Categoria" => "",
			"Presentacion" => "",
			"Stock" => ""
		);
		if( $id != 0 ) {
			global $conn;
			$id = $_GET["id"];
			$producto = $conn->prepare("SELECT * FROM productos WHERE idProducto = :id");
			$producto->bindParam(":id", $id, PDO::PARAM_INT);
			if ( $producto->execute() ) {
				$producto = $producto->fetch();
			}
		}
		return $producto;
	}

	function CrearProducto($nombre, $precio, $marca, $categoria, $presentacion, $stock, $imagen){
		global $conn;
		$rta = "0x007";
		$directorio = UPLOADS . "/" . $imagen["name"];

		if( move_uploaded_file( $imagen["tmp_name"], $directorio ) == true ){
			$producto = $conn->prepare("INSERT INTO productos (Nombre, Precio, Marca, Categoria, Presentacion, Stock, Imagen) VALUES (:nombre, :precio, :marca, :categoria, :presentacion, :stock, :imagen)");

			$producto->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$producto->bindParam(":precio", $precio, PDO::PARAM_STR);
			$producto->bindParam(":marca", $marca, PDO::PARAM_INT);
			$producto->bindParam(":categoria", $categoria, PDO::PARAM_INT);
			$producto->bindParam(":presentacion", $presentacion, PDO::PARAM_STR);
			$producto->bindParam(":stock", $stock, PDO::PARAM_INT);
			$producto->bindParam(":imagen", $imagen["name"], PDO::PARAM_STR);

			if ( $producto->execute() ) {
				$rta = "0x006";
			}
		} else {
			$rta = "0x012";
		}
		header("location: " . BACK_END_URL . "/?page=panel&rta=" . $rta);
	}
	
	function ActualizarProducto($id, $nombre, $precio, $marca, $categoria, $presentacion, $stock,  $imagen, $imagenActual){
		global $conn;
		$rta = "0x009";

		if( $imagen["error"] == 0 ){
			$directorio = UPLOADS . "/" . $imagen["name"];
			if( move_uploaded_file( $imagen["tmp_name"], $directorio ) == true ){
				$sqlImagen = $imagen["name"];
				unlink( UPLOADS . "/" . $imagenActual );

			}
		} else {
			$sqlImagen = $imagenActual;
		}

		$producto = $conn->prepare("UPDATE productos SET Nombre = :nombre, Precio = :precio, Marca = :marca, Categoria = :categoria, Presentacion = :presentacion, Stock = :stock, Imagen = :imagen WHERE idProducto = :id");
					
		$producto->bindParam(":id", $id, PDO::PARAM_INT);
		$producto->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$producto->bindParam(":precio", $precio, PDO::PARAM_STR);
		$producto->bindParam(":marca", $marca, PDO::PARAM_INT);
		$producto->bindParam(":categoria", $categoria, PDO::PARAM_INT);
		$producto->bindParam(":presentacion", $presentacion, PDO::PARAM_STR);
		$producto->bindParam(":stock", $stock, PDO::PARAM_INT);
		$producto->bindParam(":imagen", $sqlImagen, PDO::PARAM_STR);

		if ( $producto->execute() ) {
			$rta = "0x008";
		}
		header("location: " . BACK_END_URL . "/?page=panel&rta=" . $rta);
	}
	
	function BorrarProducto($id, $imagenActual){
		global $conn;
		$rta = "0x011";
		$id = $_POST["id"];
		$producto = $conn->prepare("DELETE FROM productos WHERE idProducto = :id");
		
		$producto->bindParam(":id", $id, PDO::PARAM_INT);

		if ( $producto->execute() ) {
			$rta = "0x010";
			unlink( UPLOADS . "/" . $imagenActual );
		}
		header("location: " . BACK_END_URL . "/?page=panel&rta=" . $rta);
	}

	function listarUsuarios()
	{
		global $conn;

		$stmt = $conn->prepare('SELECT * FROM usuarios');
		if( $stmt->execute() )
		{
			while ( $row = $stmt->fetch() ) 
			{
				$nombre   = $row['Nombre'];
				$apellido = $row['Apellido'];
				$email    = $row['Email'];

				echo '<tr>';
					echo '<td>'.$nombre.'</td>';
					echo '<td>'.$apellido.'</td>';
					echo '<td>'.$email.'</td>';
					echo '<td>';
						echo '<a href="?page=modificar-usuario&id='.$row['idUsuario'].'">Modificar</a> / ';
						echo '<a href="?page=eliminar-usuario&id='.$row['idUsuario'].'" >Eliminar</a>';
					echo '</td>';
				echo '</tr>';
			}
		}else{
			echo 'se rompió todo!!!';
		}
	}

	function getUsuario($id)
	{
		global $conn;

		$rta = '0x030';

		$stmt = $conn->prepare('SELECT * FROM usuarios WHERE idUsuario = :id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		if( $stmt->rowCount() > 0 )
		{
			$row = $stmt->fetch();
			$usuario = array(
								 'nombre'   => $row['Nombre']
								,'apellido' => $row['Apellido']
								,'email'    => $row['Email']
							);

			return $usuario;
		}else{
			header("location: " . BACK_END_URL . "/?page=lista-usuarios&rta=" . $rta);
		}
	}

	function editarUsuario($post)
	{
		$rta = '0x030';

		if( !isset($post['nombre']) )
			return false;

		global $conn;

		$nombre = $post['nombre'];
		$apellido = $post['apellido'];
		$email = $post['email'];
		$id = $post['id_usuario'];

		$stmt = $conn->prepare('SELECT * FROM usuarios WHERE Email = :email');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() > 0)
		{
			$rta = '0x028';
		}else{
			$stmt = $conn->prepare('UPDATE usuarios SET Nombre = :nombre, Apellido = :apellido, Email = :email WHERE idUsuario = :id');

			$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
			$stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);

			if($stmt->execute())
				$rta = '0x025';
		}

		header("location: " . BACK_END_URL . "/?page=lista-usuarios&id=".$id."&rta=" . $rta);
	}

	function eliminarUsuario($id)
	{
		global $conn;

		$stmt = $conn->prepare('DELETE FROM usuarios WHERE idUsuario = :id');
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		if($stmt->execute())
		{
			$rta = '0x030';
		}else{
			$rta = '0x031';
		}

		header("location: " . BACK_END_URL . "/?page=lista-usuarios&id=".$id."&rta=" . $rta);
	}
?>