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
		
		return $mensajeDB;
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

			$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
			$usuario->bindParam(':email', $email, PDO::PARAM_STR);
			if($usuario->execute() && $usuario->rowCount() > 0)
			{
				$usuario = $usuario->fetch();
				$passDB = $usuario["pass"];
				
				if(password_verify( $pass, $passDB ))
				{
					$rta = "0x028";
				}else{
					$rta = "0x029";
				}

				$rta = "0x020";
				$ruta = "ingreso";
			}else{
				$ruta = 'ingreso';
				$rta = "0x027";
			}
		}
		header("location: " . BACK_END_URL . "?page=".$ruta."&rta=" . $rta);
	}

		/*
		$rta = "0x019";
		$ruta = "ingreso";

		$usuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND estado = 1");
		$usuario->bindParam(":email", $email, PDO::PARAM_STR);

		if ( $usuario->execute() && $usuario->rowCount() > 0 ) {

			$usuario = $usuario->fetch();

			if (password_verify($pass, $usuario["Pass"])) {
				session_start();
				$_SESSION["Usuario"] = array(
					"Nombre" => $usuario["Nombre"],
					"Apellido" => $usuario["Apellido"],
					"Email" => $usuario["Email"]
				);
				$rta = "0x020";
				$ruta = "panel";
			}
		}
		header("location: " . BACK_END_URL . "/?page=".$ruta."&rta=" . $rta);
		
	}*/
?>