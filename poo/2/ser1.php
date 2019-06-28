<?php

include("__persona.php");

$x=new persona("Juan","Perez");

// aca serializo el objeto y lo guardo en una variable
$cad=serialize($x);

// grabo la cadena en un archivo txt
$fp=fopen("persona.txt","w");
fwrite($fp,$cad);
fclose($fp);

echo "Archivo grabado";





?>