<?php

// aca defino la superclase
class Persona
{
	public $nombre;
	public $apellido;
	public $tipo;

	// esta funcion es el constructor
	/*
	function Persona(){
		$this->tipo='DNI';				
	}
	*/

	// otra forma de llamar al constructor sin tener que 
	// nombrar a la funcion igual que la clase
	function __construct($n,$a,$t='DNI'){  // si no le paso el parametro el valor por defecto del tipo es DNI
		$this->tipo=$t;	
		$this->nombre=$n;
		$this->apellido=$a;					
	}

	// destructor
	function __destruct(){
		echo "Objeto destruido"; 
	}

	function verDatos(){
		echo "$this->nombre,<B>$this->apellido</B>";
		echo "<BR>";		
		echo "Tipo documento : $this->tipo";		
	}	
}

// aca toma el valor CI que se le pasa
//$x=new Persona('JUAN','PEREZ','CI');


// aca tipo toma el valor por defecto al no pasarle el parametro
$x=new Persona('JUAN','PEREZ');
$x->verDatos();


echo "<BR>";
echo "<BR>";
echo "<HR>";

// esto es para destruir el objeto antes de que termine el programa
unset($x);
echo "<HR>";




?>