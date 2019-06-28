<?php
// toma la fecha del dia
$fecha=new DateTime();
echo $fecha->format("d/m/Y");
?>
<hr>

<?php
//originalmente
$fecha1 = time();
echo date("d-M-Y h:i:s", $fecha1);

echo "<hr>";
echo "<p>Feha mas 1 dia y una hora</p>";
$fecha1 = $fecha1 + 60*60*24 ;		//sumo 1 dia
$fecha1 = $fecha1 + 60*60 ;		//sumo 1 hora
echo date("d-M-Y h:i:s", $fecha1);

echo "<hr>";

// si quiero especificar una fecha pongo asi
//$fecha=new DateTime("2013-03-20");

// toma la fecha del dia
$fecha=new DateTime();

$fecha->modify("+1 day");
$fecha->modify("-2 month");
echo $fecha->format("d/m/Y");

?>