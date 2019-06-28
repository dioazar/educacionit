<?php 
	require_once('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones de cadenas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<p>Todas las funciones de cadenas se pueden encontrar encontrar en este <a href="http://php.net/manual/es/ref.strings.php">link</a> (manual oficial de PHP)</p>
		<?php 
			$cadena = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius facilis, recusandae fugit voluptatibus ex. In velit culpa dicta nostrum ad nihil beatae, praesentium, totam perspiciatis atque dolorum sapiente labore tempore!';
			//Strtoupper pasa a mayúsculas
			//Strtolower pasa a minúsculas
			$upper = strtoupper( $cadena );
			$lower = strtolower( $cadena );
			ejemplo('upper()', $upper);
			ejemplo('lower()', $lower);

			//strken devuelve la cantidad de caracteres
			$len = strlen($cadena); 
			ejemplo('strlen()', $len);
			
			//number_format (número, decimales, punto decimal, separador de miles);
			//Sirve para darle formato a los numeros
			$num = 154643.364554;
			ejemplo( 'number_format()', number_format($num,2,',','.') );

			//substr() sirve para extraer o cortar una cadena de texto
			//substr (cadena, comienzo, longitud)
			echo '<h4>substrg()</h4>';
			echo substr('Curso de PHP', 1). "<br>";  // urso de PHP
			echo substr('Curso de PHP', 1, 3). "<br>";  // urs
			echo substr('Curso de PHP', 0, 5). "<br>";  // Curso
			echo substr('Curso de PHP', 0, 12). "<br>";  // Curso de PHP
			echo substr('Curso de PHP', -3). "<br>";  // PHP
			echo substr('Curso de PHP', -3,2). "<br>";  // PH

			//rtrim()
			//Elimina el espacio en blanco (o más caracteres) del final de una cadena.
			//rtrim ( string cadena [, string lista_caracteres] )
			//Como opcional se le pueden indicar una lista de caracteres que se desean eliminar:
			echo '<h4>rtrim()</h4>';
			$text = "Espacio al final                                                       ";
			var_dump($text);
			echo '<br>';
			var_dump(rtrim($text));

			// ltrim() 
			//Elimina el espacio en blanco (o más caracteres) del principio de una cadena
			// ltrim ( string cadena [, string lista_caracteres] )
			echo '<h4>ltrim()</h4>';
			$text = "                                                    espacio al principio";
			var_dump($text);
			echo '<br>';
			var_dump(ltrim($text));

			// trim() 
			//Elimina espacios en blanco (u otros caracteres) del principio y final de una cadena.
			echo '<h4>trim()</h4>';
			$text = "                                                    espacio al principio";
			var_dump($text);
			echo '<br>';
			var_dump(trim($text));


			// split() 
			//Esta función se utiliza para dividir cadenas con un separador previamente definido.
			echo '<h4>split()</h4>';
			$separador = " ";
			$vec = split($separador, "Curso de PHP" );

		    foreach ($vec as $key => $value) {
		    	echo $value ."<br>\n" ;
		    }
			var_dump($vec);

			
			////////////// Funciones de redondeo

			//round() redondea un número
			//round(numero, precision)
			ejemplo('round()', round(1.95583, 2) );

			//ceil() redondea un número hacia arriba
			//ceil(numero)
			ejemplo('ceil()', ceil(4.3) );

			//floor() redondea un número hacia abajo
			//floor(numero)
			ejemplo('floor()', floor(4.3) );


			//Funciones básicas de cifrado y encriptación


			//password_hash()
			ejemplo('password_hash()', password_hash('password123', PASSWORD_DEFAULT));

			//password_verify()
			$hash = '$2y$10$S9xSrMxU.Vv4YpC8NYwbAOrG6XmjHmlPgcSkw.1X6HvOEiNjBkmyG';
			if (password_verify('password123', $hash)) {
			    echo '¡La contraseña es válida!';
			} else {
			    echo 'La contraseña no es válida.';
			}
			echo '<br><br>';

			//Conversión de tipos de datos

			//Intval: Para obtener el valor entero de una variable
			$num = '123456';
			var_dump($num);
			var_dump(intval($num));

			//floatval: Para obtener el valor flotante de una variable
			var_dump(floatval($num));

			//strval: Para obtener el valor de cadena de una variable
			var_dump(strval($num));


			//Consultar tipos de datos
			//isset(): Determina si una variable está definida
			if(isset($num))
				ejemplo('isset()', $num);

			//unset(): Remueve una variable dada
			unset($num);
			if(!isset($num))
				ejemplo('unset()', 'con unset() la variable ya no existe');

			//gettype():Obtiene el tipo de una variable
			ejemplo( 'gettype()', gettype($cadena) );

			//settype():Define el tipo de una variable
			ejemplo( 'settype()', settype($text, "integer")  );

			//empty():Determina si una variable está vacía
			if (empty($var)) 
    			ejemplo('empty()', '$var es o bien 0, vacía, o no se encuentra definida en absoluto');

			//is_integer(), is_double(), is_string()
			if(is_integer(20))
				ejemplo( 'is_integer()', 'bool si es o no integer' );

			if(is_double(20000000000000000000000000000000000000000))
				ejemplo( 'is_double()', 'bool si es o no double' );

			if(is_string($cadena))
				ejemplo( 'is_string()', 'bool si es o no string' );

			//intval(), doubleval(), strval()
			if(intval($cadena))
				ejemplo( 'intval()', 'bool si es o no string' );

			//is_null():  Encuentra si una variable es NULL
			if(is_null($cadena))
				ejemplo( 'is_null()', 'bool si es o no null' );

			//is_numeric(): Encuentra si una variable es un número o una cadena numérica
			if(is_numeric(123456))
				ejemplo( 'is_numeric()', 'bool si es o no numerico' );
		?>
	</div>
</body>
</html>