<?php 
/**
 * 
 */
class Marcas
{
	public $id_marca;
	public $nombre;

	private $pdo;

	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	function getMarcas()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM marcas");
		$stmt->execute();

		$marcas = array();
		$i = 0;

		while ( $row = $stmt->fetch() ) 
		{
			$myMarca = new Producto();

			$myMarca->id_marca = $row['idMarca'];
			$myMarca->nombre = $row['Nombre'];

			$marcas[$i] = $myMarca;
			$i++;
		}
		
		return $marcas;
	}
}

?>