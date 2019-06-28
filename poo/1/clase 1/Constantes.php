<?php
class Persona
{
	public $nombre;
	public $apellido;
	public $sexo;

	const HOMBRE="M";
	const MUJER="F";

	function __construct($n,$a){ 
		// se usa self en lugar del nombre de la clase
		// y de esa manera evitar equivocaciones al escribir
		$this->sexo=self::HOMBRE;	
		$this->nombre=$n;
		$this->apellido=$a;					
	}	
	function verDatos(){
		echo "$this->nombre,<B>$this->apellido</B><BR>";
		echo "Sexo  : $this->sexo<BR>";
				
	}	
	
	
}

$x=new Persona('JUAN','PEREZ');

//$x->sexo=Persona::HOMBRE;

$x->verDatos();

?>