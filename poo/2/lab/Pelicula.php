<?php

/**
 * @author educacionit
 */

require_once('class.conexion.php');

class Pelicula {
	
	var $codigo;
	var $titulo;
	var $genero;
	var $butacas;
	var $disponibles;
	
	var $pdo;
	
	
	function __construct($cod = null)
	{
		// esta funcion busca la pelicula y trae los datos
		$conn = new Conexion();
		$this->pdo = $conn->pdo;
		
		if($cod != null){
			$stmt = $this->pdo->prepare("SELECT * FROM peliculas WHERE cod_pelicula=:cod");
			$stmt->bindValue(":cod",$cod);
			$stmt->execute();
			
			//$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$result = $stmt->fetch();

			$this->codigo=$result['cod_pelicula'];
			$this->titulo=$result['nombre'];
			$this->genero=$result['genero'];
			$this->butacas=$result['butacas'];		
			$this->disponibles=$result['disponibles'];
		}
	
		//$this->pdo=null;
		// aca no se cierra la conexion, lo hago en el destructor
	}	
	
	function __destruct()
	{
		$this->pdo=null;	
	}
	
	function verDatos()
	{
		echo "<BR>";
		echo "Titulo : $this->titulo   Genero : $this->genero<BR>";
	
	}
	
	function reservar(){
		// resto uno a disponibles, ya tengo el objeto porque lo cree cuando hice
		// $obj=......
		
		// ejm del uso del incrementador
		// $a=1;
		// $b=2;
		// $a = $b++; aca queda a=2
		// $a = ++$b; aca queda a=3
		
		if($this->disponibles>0)
		{
			$this->disponibles--;
			$this->guardar_disponibles();
			return true;								
		}
		
		return false;	
	}
	
	function devolver()
	{
		if($this->disponibles < $this->butacas){
			$this->disponibles++;
			$this->guardar_disponibles();
			return true;									
		}
		
		return false;	
	}
	
	function guardar_disponibles()
	{
		// actualizo el campo disponibles en la base de datos con el nuevo calculo
		// ya tengo la conexion abierta
		$stmt = $this->pdo->prepare("UPDATE peliculas SET disponibles=$this->disponibles 
					 WHERE cod_pelicula=$this->codigo");
		$stmt->execute();
	}

	function getAllPeliculas()
	{
		return $this->pdo->query("SELECT cod_pelicula FROM peliculas");
	}
	
}

?>