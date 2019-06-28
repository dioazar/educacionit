<?php

class persona{
	public $nombre;
	public $apellido;	


	function __construct($n,$a){
		$this->nombre=$n;
		$this->apellido=$a;

		
	}	

	function verDatos(){

		echo "$this->nombre, $this->apellido<br>";
		echo "<HR>";
			
	}	

}

$x=new persona('Juan','Perez');
$x->verDatos();

//$z=$x;

$z=clone $x;
$x->nombre='Martin';

$x->verDatos();
$z->verDatos();


?>