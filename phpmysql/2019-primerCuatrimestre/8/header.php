<!DOCTYPE html>
<html>
	<head>
	<title>ComercioIT | Tu E-Shop en PHP</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="utf-8">
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<!--script-->
	</head>
	<body> 
		<!--header-->
		<div class="header">
			<div class="bottom-header">
				<div class="container">
					<div class="header-bottom-left">
						<div class="logo"><a href="./">Comercio<strong>IT</strong></a></div>
						<div class="search">
							<form method="POST" action="index.php?page=productos">
								<input type="text" name="b">
								<input type="submit" value="BUSCAR">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					

					<div class="header-bottom-right">
						<ul class="login">
							<?php if (checkUser()): ?>
								<li>Bienvenido <?php echo $_COOKIE['username'] ?></li>
								&nbsp;|&nbsp;
								<li><a href="?page=productos">PRODUCTOS</a></li>
								&nbsp;|&nbsp;
								<li><a href="?page=admin-usuarios">USUARIOS</a></li>
								&nbsp;|&nbsp;
								<li><a href="usuario.php?action=logout">CERRAR SESION</a></li>
							<?php else: ?>
								
								<li><a href="?page=ingreso"><span></span> INGRESAR</a></li>
								&nbsp;|&nbsp;
								<li><a href="?page=registro">REGISTRARME</a></li>
							<?php endif ?>
								&nbsp;|&nbsp;
								<li><a href="?page=contacto">CONTACTO</a></li>
						</ul>
						<!--div class="cart"><a href="#"><span></span>CART</a></div-->
						
						<div class="clearfix"></div>

					</div>


					<div class="clearfix"></div>	
				</div>
			</div>
		</div>
		<!---->
		<div class="container">