<?php
	require_once('constantes.php');
	require_once('funciones.php');

	//$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 'home';
	}

	require_once('header.php');

//www.mipagina.com/index.php?page=mipagina
//mipagina.php
?>
<section id="page">
	<?php CargarPagina( $page ); ?>
</section>
<?php include("footer.php"); ?>