<?php

// tengo que volver a incluir la clase porque al des serializar vuelvo
// a construir el objeto
include("__persona.php");

$fp=fopen("persona.txt","r");
$cad=fread($fp,3000);
fclose($fp);

$z=unserialize($cad);  // aca crea el objeto z
$z->verDatos();



?>