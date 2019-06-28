<?php 
	$productos = getAllProductos();
	//myPrint($productos);
?>
<?php foreach ($productos as $key => $value): ?>
	<div class="card" style="width: 18rem;">
	  	<img class="card-img-top" src="<?php echo UPLOADS_URL.$value['imagen']; ?>" alt="Card image cap">
	  	<div class="card-body">
	    	<h5 class="card-title"><?php echo $value['nombre']; ?></h5>
	    	<p class="card-text">$<?php echo $value['precio']; ?></p>
	    	<a href="?page=detalle-producto&id=<?php echo $value['id'] ?>" class="btn btn-primary">Detalle</a>
	  	</div>
	</div>
<?php endforeach ?>
