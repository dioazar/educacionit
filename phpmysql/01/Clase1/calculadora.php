<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<form action="calculadora-resultado.php" method="post">
		  <div class="form-group">
		    <label>Numero 1</label>
		    <input type="number" class="form-control" name="numero1">
		  </div>
		  <div class="form-group">
		    <label>Numero 2</label>
		    <input type="number" class="form-control" name="numero2">
		  </div>
		  <div class="input-group-text">
		  	<input type="radio" name="operacion" value="sumar">
		  	<label>Sumar</label>
		  </div>
		  <div class="input-group-text">
		  	<input type="radio" name="operacion" value="restar">
		  	<label>Restar</label>
		  </div>
		  <div class="input-group-text">
		  	<input type="radio" name="operacion" value="dividir">
		  	<label>Dividir</label>
		  </div>
		  <div class="input-group-text">
		  	<input type="radio" name="operacion" value="multiplicar">
		  	<label>Multiplicar</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>