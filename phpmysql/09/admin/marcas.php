<?php 
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	if(isset($_POST['marca']))
		addMarca($_POST);
?>
<div class="main">
	<h1><?php echo $action; ?> marca</h1>
	<form action="" method="post">
		<label>Marca</label>
		<input type="text" name="marca" placeholder="Nueva marca">
		<br>

		<input type="submit" name="">
	</form>	
</div>
