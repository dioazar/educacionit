<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

/*** database name ***/
$dbname = 'animals';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';

    /*** The SQL SELECT statement with incorrect fieldname ***/
    $sql = "SELECT username FROM animals";

    /*** setea el atributo el tipo de reporte de error ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    foreach ($dbh->query($sql) as $row)
        {
        print $row['animal_type'] .' - '. $row['animal_name'] . '<br />';
        }

    /*** close the database connection ***/
    $dbh = null;
}
catch(PDOException $e)
    {
	echo $e->getMessage();
    }
?> 