<?php 
	//print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
	<head>
	<title>ComercioIT | Tu E-Shop en PHP</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
							<form action="?page=panel" method="POST">
								<input type="text" name="textoBuscado">
								<input type="submit" value="BUSCAR">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					

					<div class="header-bottom-right">
						<ul class="login">
							<?php if (isset($_SESSION['login'])): ?>
								<li>Bienvenido <?php echo $_SESSION['usuario']; ?></li>
								<img src="<?php echo 'images/uploads/'.$_COOKIE['url_imagen']; ?>" style="max-width: 20px; max-height: 20px">
								&nbsp;|&nbsp;
								<li><a href="?page=PANEL">Panel</a></li>
								&nbsp;|&nbsp;
								<li><a href="?page=abmusuarios">Usuarios</a></li>
								&nbsp;|&nbsp;
								<li><a href="?page=miperfil">Mi perfil</a></li>
								&nbsp;|&nbsp;
								<li><a href="?page=cerrarSesion">Cerrar sesion</a></li>
							<?php else: ?>
								<li><a href="?page=ingreso"><span></span> INGRESAR</a></li>
							&nbsp;|&nbsp;
								<li><a href="?page=registro">REGISTRARME</a></li>
							<?php endif ?>
							&nbsp;|&nbsp;
							<li><a href="?page=contacto">CONTACTO</a></li>
							&nbsp;|&nbsp;
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