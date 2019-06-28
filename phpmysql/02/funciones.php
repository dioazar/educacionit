<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 
			echo "IP: " . getenv("REMOTE_ADDR") . "<br>\n" ;
			echo "PATH: " . getenv("DOCUMENT_ROOT") . "<br>\n" ;
			echo "SERVER NAME: " . getenv("SERVER_SOFTWARE") . "<br>\n" ;
			echo "BROWSER: " . getenv("HTTP_USER_AGENT") . "<br>\n" ;

			foreach ( $_SERVER as $i=>$v )
        		echo '<b> '.$i.' </b>:'. $_SERVER[$i] .' <br>';

		?>
	</div>
</body>
</html>