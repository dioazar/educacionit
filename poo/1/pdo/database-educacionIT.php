<?

///////////////////////////////////////////////////////////
// Funciones reutilizables aplicables solo a educacionIT //
///////////////////////////////////////////////////////////



/*
Autor: Sebastián M. Divinsky
Fecha: 26/04/2006
Objetivo: Lee del archivo de texto las diferentes promos para la pagina principal
*/
function conectar_db()
{

	@ $link = mysql_connect("localhost", "sebadivi_root", "root"); 
	// @ $link = mysql_connect("localhost", "tw000211_educaci", "Educacion08"); 
	// @ $link = mysql_connect("localhost", "root", "root"); 
	
	@ mysql_select_db("sebadivi_educacionit", $link); 
	// @ mysql_select_db("educacio_db", $link); 

	return $link;
}


function conectar_db_sitio()
{

	@ $link = mysql_connect("www.educacionit.com.ar", "educacio_root", "root"); 
	// @ $link = mysql_connect("localhost", "root", "root"); 
	
	//@ mysql_select_db("educacionit", $link); 
	@ mysql_select_db("educacio_db", $link); 

	return $link;
}



/*
Autor: Sebastián M. Divinsky
Fecha: 26/04/2006
Objetivo: Lee del archivo de texto las diferentes promos para la pagina principal
*/
function consulta_db( $query, $link ) //, &$affectados, &$numReg )
{

	$rs = mysql_query($query, $link); 
	echo mysql_error();
/*
	if ( isset($affectados))
		$affectados = mysql_affected_rows($link);

	if ( isset($numReg))
		$numReg = mysql_num_rows($rs);
	*/
	return $rs;
}



/*
Autor: Sebastián M. Divinsky
Fecha: 26/04/2006
Objetivo: Lee del archivo de texto las diferentes promos para la pagina principal
*/
function cerrar_db( $link )
{
	//cerrar la conexión
	@ mysql_close ($link);

}
?>