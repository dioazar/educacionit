<?php
class Conexion
{
	var $host   ='localhost';
	var $dbname ='phpdb';
	var $user   ='root';
	var $psw    ='';
	
	var $pdo;

	function __construct()
	{
		$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->psw);
	}
}


?>