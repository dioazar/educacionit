<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proyecto Final</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		    <div class="navbar-header">
		      	<a class="navbar-brand" href="#">Cine</a>
		    </div>
		    <ul class="nav navbar-nav" id="tabMenu">
		      	<li><a href="reporte.php">Reservas</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    	<?php if (isset($_SESSION['Usuario'])): 
		    		$myUsuario = json_decode($_SESSION['Usuario']);
		    	?>
		    		<li><a href="javascript:void(0)"><span class="glyphicon glyphicon-user"></span> <?php echo $myUsuario->nombre; ?></a></li>
		    		<li><a href="javascript:void(0)" onclick="logout()"> Cerrar sesión</a></li>		    		
		    	<?php else: ?>
		    		<li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
		      		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    	<?php endif ?>
		    </ul>
		</div>
	</nav>
