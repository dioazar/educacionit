<?php 
	if(isset($_GET['id']))
		$id_producto = $_GET['id'];
	else
		die();

	$miProducto = getProductoById($id_producto);
	$misImagenes = getGaleria($id_producto);
	$nombre = $miProducto['Nombre'];
	/*echo '<pre>';
	print_r($misImagenes);
	echo '</pre>';*/

	//MERCADOPAGO
	//https://www.mercadopago.com.ar/developers/es/solutions/payments/basic-checkout/receive-payments/
	require_once ('sdk-php-master/lib/mercadopago.php');

	$mp = new MP('7413602227109116', 'OZ3PsPBIfB3b7xSBNmTlTBpYlk9tQxEC');

	//SIMPLE
	$preference_data = array(
		"items" => array(
			array(
				"title" => "$nombre",
				"quantity" => 1,
				"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
				"unit_price" => floatval( $miProducto['Precio'] ),
			)
		)
	);

	//COMPLETO
	/*
	$preference_data = array(
		"items" => array(
			array(
				"id" => "$id_producto",
				"title" => "$nombre",
				"currency_id" => "USD",
				"picture_url" =>"https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
				"description" => "Description",
				"category_id" => "Category",
				"quantity" => 1,
				"unit_price" => floatval( $miProducto['Precio'] )
			)
		),
		"payer" => array(
			"name" => "user-name",
			"surname" => "user-surname",
			"email" => "user@email.com",
			"date_created" => "2014-07-28T09:50:37.521-04:00",
			"phone" => array(
				"area_code" => "11",
				"number" => "4444-4444"
			),
			"identification" => array(
				"type" => "DNI",
				"number" => "12345678"
			),
			"address" => array(
				"street_name" => "Street",
				"street_number" => 123,
				"zip_code" => "1430"
			)
		),
		"back_urls" => array(
			"success" => "https://www.success.com",
			"failure" => "http://www.failure.com",
			"pending" => "http://www.pending.com"
		),
		"auto_return" => "approved",
		"payment_methods" => array(
			"excluded_payment_methods" => array(
				array(
					"id" => "amex",
				)
			),
			"excluded_payment_types" => array(
				array(
					"id" => "ticket"
				)
			),
			"installments" => 24,
			"default_payment_method_id" => null,
			"default_installments" => null,
		),
		"shipments" => array(
			"receiver_address" => array(
				"zip_code" => "1430",
				"street_number"=> 123,
				"street_name"=> "Street",
				"floor"=> 4,
				"apartment"=> "C"
			)
		),
		"notification_url" => "https://www.your-site.com/ipn",
		"external_reference" => "Reference_1234",
		"expires" => false,
		"expiration_date_from" => null,
		"expiration_date_to" => null
	);
	*/

	$preference = $mp->create_preference($preference_data);

	?>

<h1><?php echo $miProducto['Nombre']; ?></h1>
<h3>Precio : <?php echo $miProducto['Precio']; ?></h3>
<img src="<?php echo UPLOADS_URL . "/" . $miProducto["Imagen"]; ?>">

<h3>Galeria</h3>


	<?php foreach ($misImagenes as $value): ?>
		<!--div class="carousel-item active">
		    <img class="d-block w-100" src="<?php echo UPLOADS_URL . "/" . $value["url_imagen"]; ?>" alt="First slide">
		</div-->
	<?php endforeach ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  	<div class="carousel-inner">
  		<?php foreach ($misImagenes as $key => $value): 
  				$active = $key == 0 ? 'active' : '';
  		?>
			<div class="carousel-item <?php echo $active; ?>">
			    <img class="d-block w-100" src="<?php echo UPLOADS_URL . "/" . $value["url_imagen"]; ?>" alt="First slide">
			</div>
		<?php endforeach ?>
  	</div>
  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
  	</a>
  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
  	</a>
</div>

<a href="<?php echo $preference['response']['init_point']; ?>">Comprar con mercadopago</a>
<br>
<a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pagar con Mercado pago</a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!--script de MP-->
<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>