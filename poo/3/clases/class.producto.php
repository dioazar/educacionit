<?php

require_once ('class.conexion.php');
require_once ('class.mensajes.php');
require_once ('class.encriptacion.php');
require_once ('class.marcas.php');
require_once ('class.categorias.php');

class Producto 
{

	public $codigo;
	public $nombre;
	public $precio;
	public $cantidad;
	public $id_marca;
	public $id_categoria;
	
	private $pdo;
	
	function __construct()
	{
		$conexion = new Conexion();
		$this->pdo = $conexion->pdo;
	}

	function getProductos()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM productos");
		$stmt->execute();

		$productos = array();
		$i = 0;

		while ( $row = $stmt->fetch() ) 
		{
			$myProducto = new Producto();

			$myProducto->nombre = $row['Nombre'];
			$myProducto->precio = $row['Precio'];
			$myProducto->cantidad = $row['Stock'];
			$myProducto->codigo = Encriptacion::encriptar($row['idProducto']);

			$productos[$i] = $myProducto;
			$i++;
		}
		
		return $productos;
	}

	function nuevoProducto()
	{
		
	}

	function getMarcas()
	{
		$marcas = new Marcas($this->pdo);
		return $marcas->getMarcas();
	}

	function getCategorias()
	{
		$categorias = new Categorias($this->pdo);
		return $categorias->getCategorias();
	}

}