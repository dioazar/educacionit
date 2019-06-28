<?php

class persona{
	public $nombre;
	protected $apellido;
	private $documento;
	
	function setApellido($valor){
		$this->apellido=$valor;
	}	

	function getApellido(){
		return $this->apellido;
	}

	function setDocumento($valor){
		$this->documento=$valor;
	}	

	function getDocumento(){
		return $this->documento;
	}	
}

class alumno extends persona{
	public $notas;

	function __construct($n,$a,$d,$not){
		$this->nombre=$n;
		$this->apellido=$a;
		$this->setDocumento($d);
		$this->notas=$not;				
	}

	function verDatos(){
		// para traer apellido puedo acceder directamente
		// a la variable porque esta definida protected, 
		// la puedo acceder desde una clase que hereda
		// la clase padre
		echo "$this->nombre, $this->apellido<br>";
		// para documento tengo que usar el getter porque
		// esta definida como privada
		echo "DOC : ".$this->getDocumento()."<br>";
		echo "Notas : $this->notas<br>";
			
	}	
}

$x=new alumno('Juan','Perez',456789,8);
$x->verDatos();



?>