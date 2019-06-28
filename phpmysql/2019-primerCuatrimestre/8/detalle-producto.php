<?php
	$id = $_GET['id'];
	$myProduct = getProducto($id);
	$marca = getMarca($myProduct['Marca']);
?>

<div class="card" style="width: 18rem;">
  	<img class="card-img-top" src="<?php echo UPLOADS_URL.$myProduct['Imagen']; ?>" alt="Card image cap">
  	<div class="card-body">
    	<h5 class="card-title"><strong>Nombre:</strong> <?php echo $myProduct['Nombre']; ?></h5>
    	<p class="card-text"><strong>Precio:</strong> $<?php echo $myProduct['Precio']; ?></p>
    	<p class="card-text"><strong>Marca:</strong> <?php echo $marca['Nombre']; ?></p>
    	<p class="card-text"><strong>Categoria:</strong> <?php echo $myProduct['Categoria']; ?></p>
    	<p class="card-text"><strong>Presentación:</strong> <?php echo $myProduct['Presentacion']; ?></p>
    	<p class="card-text"><strong>Stock:</strong> <?php echo $myProduct['Stock']; ?></p>
    	<a href="#" class="btn btn-primary">Comprar</a>
  	</div>
</div>