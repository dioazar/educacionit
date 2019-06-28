<?php 
/**
* 
*/
require_once 'Conexion.php';

class Pruebas
{
	public $text;
	public $cod;

	/*function __construct(argument)
	{
		# code...
	}*/

	function helloWorld()
	{
		$helloWorld = new Pruebas();
		$helloWorld->text = 'helloWorld';
		$helloWorld->cod = -1;

		return $helloWorld;
	}
}

?>