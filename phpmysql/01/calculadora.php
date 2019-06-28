<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculadora</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Calculadora</h1>
		</div>
		<form action="calculadora-resultado.php" method="post">
			<div class="form-group">
			    <label for="valor1">Valor 1</label>
			    <input type="number" class="form-control" name="numero1" placeholder="Ingresar valor 1">
		  	</div>
			<div class="form-group">
			    <label for="valor1">Valor 2</label>
			    <input type="number" class="form-control" name="numero2" placeholder="Ingresar valor 2">
			</div>
		  	<div class="form-check">
			    <input type="radio" name="operacion" class="form-check-input" value="sumar">
			    <label class="form-check-label" for="exampleCheck1">Sumar</label>
		  	</div>
		  	<div class="form-check">
			    <input type="radio" name="operacion" class="form-check-input" value="restar">
			    <label class="form-check-label" for="exampleCheck1">Restar</label>
		  	</div>
		  	<div class="form-check">
			    <input type="radio" name="operacion" class="form-check-input" value="multiplicar">
			    <label class="form-check-label" for="exampleCheck1">Multiplicar</label>
		  	</div>
		  	<div class="form-check">
			    <input type="radio" name="operacion" class="form-check-input" value="dividir">
			    <label class="form-check-label" for="exampleCheck1">Dividir</label>
		  	</div>
		  	<button type="submit" class="btn btn-primary">Calcular</button>
		</form>
	</div>
</body>
</html>