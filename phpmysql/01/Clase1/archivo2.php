<!DOCTYPE html>
<html>
<head>
	<title>Variables</title>
</head>
<body>
	<?php 
		$numero1 = 10;
		$numero2 = 20;

		$suma = $numero1 + $numero2;
		$resta = $numero1 - $numero2;
		$multiplicacion = $numero1 * $numero2;
		$division = $numero1 / $numero2;

		echo 'Suma: ' . $suma . '<br>';
		echo 'Resta: ' . $resta . '<br>';
		echo 'Multiplicacion: ' . $multiplicacion . '<br>';
		echo 'Division: ' . $division . '<br>';

		//esto es igual
		echo $numero1 = $numero1 + 1;
		echo '<br>';
		echo $numero1 += 1;
		echo '<br>';
		echo $numero1++;
		echo '<br>';
		//

		//esto es igual
		echo $numero1 = $numero1 - 1;
		echo '<br>';
		echo $numero1 -= 1;
		echo '<br>';
		echo $numero1--;
		echo '<br>';
		//

		if($numero1 != $numero2)
		{
			echo $numero1 . ' no es igual a ' . $numero2;
		}else{
			echo $numero1 . ' es igual a ' . $numero2;
		}

	 ?>
	 <br>
	 <a href="index.php">Index</a>
</body>
</html>