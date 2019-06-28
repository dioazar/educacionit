<?php


class persona{
	public $nombre;
	public $apellido;
	public $documento;
	const IVA=0.21;	
	static protected $jub=65;

	function __construct($n,$a,$d){
		$this->nombre=$n;
		$this->apellido=$a;
		$this->documento=$d;

	}

	function verDatos(){
		echo "$this->nombre, $this->apellido<br>";
		// aca no puedo hacer $x->IVA porque es una constante, no pertenece
		// a los objetos, pertenece a la clase		
		echo "IVA : ".self::IVA."<br>";  // es lo mismo que persona::IVA
		echo "Edad Jubilacion : ".self::$jub."<HR>"; // aca le pongo $ porque es una variable				
	}
	
	function setJubilacion($valor){
		self::$jub=$valor;
	}
}

$x=new persona('Jose','Gomez',4569);
$z=new persona('Carlos','Ramirez',778899);

$x->setJubilacion(70); // aca cambia el valor para todas las instancias de la clase, si 
// hubiera puesto $z->  es lo mismo, sirve por si en lugar de static public pongo
// static protected como en este caso.
 
$x->verDatos();
$z->verDatos();

?>