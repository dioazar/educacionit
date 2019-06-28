<?php
// aca defino la superclase
class Persona
{
	public $nombre;
	public $apellido;
	public $tipo;

	function verDatos(){
		echo "$this->nombre,<B>$this->apellido</B>";
		echo "<BR>";		
		echo "Tipo documento : $this->tipo";		
	}	
}

// aca defino las subclases
class Alumno extends Persona{
	public $notas;
	
	function verDatos(){
		// aca llamo al metodo de verDatos de Persona		
		// Persona::verDatos();  
		
		// aca es lo mismo que arriba pero directamente llamo a la funcion
		// verDatos del padre que en este caso es Persona
		parent::verDatos();
		
		echo "<BR>";		
		echo "Notas : $this->notas";		
	}
}

class Profesor extends Persona{
	public $cantidad;
}

// aca instancio la subclase
$x=new Alumno;

// aca asigno
$x->nombre='Juan';
$x->apellido='Perez';
$x->notas=8;
$x->tipo='DNI';

// aca en realidad estoy llamando a la funcion verDatos
// que esta definida en Alumno
$x->verDatos();

echo "<BR>";
echo "<BR>";
echo "<HR>";






?>