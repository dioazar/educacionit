<?php
	require_once('constantes.php');
	require_once('funciones.php');

	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	require_once('header.php');

?>
<section id="page">
	<?php CargarPagina( $page ); ?>
</section>
<?php include("footer.php"); ?>