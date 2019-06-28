<?php

class Persona
{
	public $nombre;
	public $apellido;

	function verDatos(){
		echo "$this->nombre,<B>$this->apellido</B>";
	}	
}

// aca instancio la clase
$x=new Persona;

// aca asigno
$x->nombre='Juan';
$x->apellido='Perez';

// aca muestro sin usar el metodo
echo "$x->nombre,$x->apellido";
echo "<BR>";
echo "<HR>";

// aca muestro usando el metodo
$x->verDatos();

echo "<BR>";
echo "<BR>";
echo "<BR>";
echo "<HR>";






?>