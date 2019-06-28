<?php 
	/*

	Dada la base de datos de periodos de ocupación de una habitación de hotel, 
	crear una consulta sql que verifique si para en la fecha 10/06/2018 -- '2018-06-10'
	si hay algun periodo que comprenda dicha fecha.

	$arrProd=array(
	    array("order"=>00001,"item"=>"remera","grandTotal"=>1000),
	    array("order"=>00002,"item"=>"buzo","grandTotal"=>2000),
	    array("order"=>00003,"item"=>"campera","grandTotal"=>4500)
	); 

	function arreglos($arreglos = null){
	    foreach($arreglos as $arreglo){
	        $iva = $arreglo['grandTotal'] * 21 / 100;
	        $total = $arreglo['grandTotal'] + $iva;
	        var_dump($total);
	        echo '<br>';
	    }
	}

	arreglos($arrProd);
	*/
$url = "http://tienda.mimo.com.ar";
$ch = curl_init($url);
curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpCode == 200) {
    echo utf8_decode('La página '.$url.' está funcionando correctamente');
}else{
	switch ($httpCode) 
	{
		case 400:
			echo 'Bad Request';
			break;
		
		case 404:
			echo 'Not Found';
			break;
		case 500:
			echo 'Internal Server Error';
			break;

		default:
			# code...
			break;
	}
}
echo '<br>';
echo $httpCode;
curl_close($ch);
?>