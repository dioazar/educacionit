<?php

class persona{
	public $nombre;
	public $apellido;	
	public $identidad;

	function __construct($n,$a){
		$this->nombre=$n;
		$this->apellido=$a;
		$this->identidad="$this->nombre,$this->apellido<br>";
		
	}	

	function verDatos(){
		echo "$this->identidad";
			
	}	
	
	function __sleep(){
		return array('nombre','apellido');
	}	
	
	function __wakeup(){
		$this->identidad="$this->nombre,$this->apellido<br>";		
	}	
	
}

?>