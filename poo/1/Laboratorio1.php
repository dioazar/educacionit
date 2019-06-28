<?php
// defino una clase que no va a ser instanciada, es abstracta
abstract class Cuentas{
	public $titular;
	public $saldo;

	function __construct($t,$s){
		$this->titular=$t;	
		$this->saldo=$s;
	}	
	
	function verDatos(){
		echo "Titular : $this->titular<BR>";
		echo "Saldo   : $this->saldo<BR>";		 
	}

	function DepositarDinero($importe){
		$this->saldo+=$importe;
	}
	
}

class CajaAhorro extends Cuentas{
	public $interes;

	function __construct($t,$s,$i){
		parent::__construct($t,$s); // aca llamo al constructor de Cuentas si no no se ejecuta 
		$this->interes=$i;	
	}	
		
	function verDatos(){
		parent::verDatos();
		
		echo "Interes  : $this->interes<BR>";
	}	
}

class CuentaCorriente extends Cuentas{
	public $limite;

	function __construct($l){
		parent::__construct($t,$s); // aca llamo al constructor de Cuentas si no no se ejecuta 		
		$this->limite=$l;	
	}		
	
	function verDatos(){
		parent::verDatos();
		
		echo "Limite  : $this->limite<BR>";
	}		
}


$x=new CajaAhorro('Juan Gomez',15000,10);
$x->verDatos();
echo "<BR>";
echo "<BR>";
echo "<HR>";
$x->DepositarDinero(10000);
$x->verDatos();



?>