<?php
	require_once('constantes.php');
	require_once('funciones.php');

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}else{
		$page = 'home';
	}
	//var_dump($_GET);

	//Otra forma de hacer un if
	//Declaro var
			//Pregunta			 ?
								   //true
												   //false
	//$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	require_once('header.php');

?>
<section id="page">
	<?php CargarPagina( $page ); ?>
</section>
<?php include("footer.php"); ?>