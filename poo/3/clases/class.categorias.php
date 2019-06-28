<?php 
/**
 * 
 */
class Categorias
{
	public $id_categoria;
	public $nombre;

	private $pdo;

	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	function getCategorias()
	{
		$stmt = $this->pdo->prepare("SELECT * FROM categorias");
		$stmt->execute();

		$marcas = array();
		$i = 0;

		while ( $row = $stmt->fetch() ) 
		{
			$myMarca = new Producto();

			$myMarca->id_categoria = $row['idCategoria'];
			$myMarca->nombre = $row['Nombre'];

			$marcas[$i] = $myMarca;
			$i++;
		}
		
		return $marcas;
	}
}
?>