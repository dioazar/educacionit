<?php 
	//en este archivo voy a almacenar mis funciones

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
			include( $modulo );
		} else {
			include( "404.php" );
		}
	}
?>